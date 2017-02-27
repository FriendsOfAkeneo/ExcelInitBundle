#!groovy

def phpVersion = "5.6"
def mysqlVersion = "5.5"
def launchUnitTests = "yes"
def launchIntegrationTests = "yes"
def launchBehatTests = "yes"
def commit = "${env.GIT_COMMIT}"

stage("Checkout") {
    milestone 1
    if (env.BRANCH_NAME =~ /^PR-/) {
        userInput = input(message: 'Launch tests?', parameters: [
            choice(choices: 'yes\nno', description: 'Run unit tests', name: 'launchUnitTests'),
            choice(choices: 'yes\nno', description: 'Run integration tests', name: 'launchIntegrationTests'),
        ])

        launchUnitTests = userInput['launchUnitTests']
        launchIntegrationTests = userInput['launchIntegrationTests']
    }
    milestone 2

    node {
        deleteDir()
        checkout scm
        stash "excel_init"

        checkout([$class: 'GitSCM',
             branches: [[name: '1.6']],
             userRemoteConfigs: [[credentialsId: 'github-credentials', url: 'https://github.com/akeneo/pim-community-standard.git']]
        ])
        stash "pim_community_dev"

       checkout([$class: 'GitSCM',
         branches: [[name: '1.6']],
         userRemoteConfigs: [[credentialsId: 'github-credentials', url: 'https://github.com/akeneo/pim-enterprise-standard.git']]
       ])
       stash "pim_enterprise_dev"
    }

    parallel community: {
        node('docker') {
            deleteDir()
            docker.image("carcel/php:5.6").inside("-v /home/akeneo/.composer:/home/akeneo/.composer -e COMPOSER_HOME=/home/akeneo/.composer") {
                unstash "pim_community_dev"
                sh "composer require akeneo/excel-init-bundle dev-jenkins --optimize-autoloader --no-interaction --no-progress --prefer-dist"
                stash "pim_community_dev_full"
            }
            deleteDir()
        }
    }, enterprise: {
        node('docker') {
            deleteDir()
            docker.image("carcel/php:5.6").inside("-v /home/akeneo/.composer:/home/akeneo/.composer -e COMPOSER_HOME=/home/akeneo/.composer") {
                unstash "pim_enterprise_dev"
                sh "composer require akeneo/excel-init-bundle dev-jenkins --optimize-autoloader --no-interaction --no-progress --prefer-dist"
                stash "pim_enterprise_dev_full"
            }
            deleteDir()
        }
    }
}

if (launchUnitTests.equals("yes")) {
    stage("Unit tests") {
        def tasks = [:]

        tasks["phpspec-5.6"] = {runPhpSpecTest("5.6")}
        tasks["phpspec-7.0"] = {runPhpSpecTest("7.0")}
        tasks["phpspec-7.1"] = {runPhpSpecTest("7.1")}

        tasks["php-cs-fixer-5.6"] = {runPhpCsFixerTest("5.6")}
        tasks["php-cs-fixer-7.0"] = {runPhpCsFixerTest("7.0")}
        tasks["php-cs-fixer-7.1"] = {runPhpCsFixerTest("7.1")}

        parallel tasks
    }
}

if (launchIntegrationTests.equals("yes")) {
    stage("Integration tests") {
        def tasks = [:]

        tasks["phpunit-5.6"] = {runIntegrationTest("5.6")}
        tasks["phpunit-7.0"] = {runIntegrationTest("7.0")}

        parallel tasks
    }
}

def runPhpSpecTest(version) {
    node('docker') {
        deleteDir()
        try {
            docker.image("carcel/php:${version}").inside("-v /home/akeneo/.composer:/home/akeneo/.composer -e COMPOSER_HOME=/home/akeneo/.composer") {
                unstash "excel_init"

                sh "composer install --ignore-platform-reqs --optimize-autoloader --no-interaction --no-progress --prefer-dist"
                sh "mkdir -p app/build/logs/"
                sh "./bin/phpspec run --no-interaction --format=junit > app/build/logs/phpspec.xml"
            }
        } finally {
            sh "sed -i \"s/testcase name=\\\"/testcase name=\\\"[php-${version}] /\" app/build/logs/*.xml"
            junit "app/build/logs/*.xml"
            deleteDir()
        }
    }
}

def runPhpCsFixerTest(version) {
    node('docker') {
        deleteDir()
        try {
            docker.image("carcel/php:${version}").inside("-v /home/akeneo/.composer:/home/akeneo/.composer -e COMPOSER_HOME=/home/akeneo/.composer") {
                unstash "excel_init"

                sh "composer install --ignore-platform-reqs --optimize-autoloader --no-interaction --no-progress --prefer-dist"
                sh "mkdir -p app/build/logs/"
                sh "./bin/php-cs-fixer fix --diff --format=junit --config=.php_cs.php > app/build/logs/phpcs.xml"
            }
        } finally {
            sh "sed -i \"s/testcase name=\\\"/testcase name=\\\"[php-${version}] /\" app/build/logs/*.xml"
            junit "app/build/logs/*.xml"
            deleteDir()
        }
    }
}

def runIntegrationTest(version) {
    node('docker') {
        deleteDir()
        docker.image("mysql:5.5").withRun("--name mysql -e MYSQL_ROOT_PASSWORD=root -e MYSQL_USER=akeneo_pim -e MYSQL_PASSWORD=akeneo_pim -e MYSQL_DATABASE=akeneo_pim") {
            docker.image("carcel/php:${version}").inside("--link mysql:mysql -v /home/akeneo/.composer:/home/akeneo/.composer -e COMPOSER_HOME=/home/akeneo/.composer") {
                unstash "pim_community_dev_full"

                if (version != "5.6") {
                    sh "composer require --no-update alcaeus/mongo-php-adapter"
                }

                sh "composer require --no-update phpunit/phpunit"
                sh "composer update --ignore-platform-reqs --optimize-autoloader --no-interaction --no-progress --prefer-dist"
                sh "cp app/config/parameters.yml.dist app/config/parameters_test.yml"
                sh "sed -i 's/database_host:     localhost/database_host:     mysql/' app/config/parameters_test.yml"
                sh "echo '' >> app/config/parameters_test.yml"
                sh "echo '    pim_installer.fixture_loader.job_loader.config_file: PimExcelInitBundle/Resources/config/fixtures_jobs.yml' >> app/config/parameters_test.yml"
                sh "echo '    installer_data: PimExcelInitBundle:minimal' >> app/config/parameters_test.yml"
                sh "sed -i 's#// your app bundles should be registered here#\\0\\nnew Pim\\\\Bundle\\\\ExcelInitBundle\\\\PimExcelInitBundle(),#' app/AppKernel.php"
                sh "./app/console --env=test pim:install --force"
            }
        }
        docker.image("mysql:5.5").withRun("--name mysql -e MYSQL_ROOT_PASSWORD=root -e MYSQL_USER=akeneo_pim -e MYSQL_PASSWORD=akeneo_pim -e MYSQL_DATABASE=akeneo_pim") {
            docker.image("carcel/php:${version}").inside("--link mysql:mysql -v /home/akeneo/.composer:/home/akeneo/.composer -e COMPOSER_HOME=/home/akeneo/.composer") {
                unstash "pim_enterprise_dev_full"

                if (version != "5.6") {
                    sh "composer require --no-update alcaeus/mongo-php-adapter"
                }

                sh "composer require --no-update phpunit/phpunit"
                sh "composer update --ignore-platform-reqs --optimize-autoloader --no-interaction --no-progress --prefer-dist"
                sh "cp app/config/parameters.yml.dist app/config/parameters_test.yml"
                sh "sed -i 's/database_host:     localhost/database_host:     mysql/' app/config/parameters_test.yml"
                sh "echo '' >> app/config/parameters_test.yml"
                sh "echo '    pim_installer.fixture_loader.job_loader.config_file: PimExcelInitBundle/Resources/config/fixtures_jobs_ee.yml' >> app/config/parameters_test.yml"
                sh "echo '    installer_data: PimExcelInitBundle:minimal_EE' >> app/config/parameters_test.yml"
                sh "sed -i 's#// your app bundles should be registered here#\\0\\nnew Pim\\\\Bundle\\\\ExcelInitBundle\\\\PimExcelInitBundle(),#' app/AppKernel.php"
                sh "./app/console --env=test pim:install --force"
            }
        }
    }
}
