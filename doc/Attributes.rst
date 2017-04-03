Attributes tab
==============

In this tab you will define every attribute depending wether they belong to one or more families.
You have to define all attributes in this worksheet before defining the families.

For more details about the keys concept of attribute, see `attribute in the user guide
<https://www.akeneo.com/wp-content/uploads/2017/03/EN-Catalog-Setting-User-Guide-PIM-CE-EE-1.7.pdf#page=5>`__.

General properties
------------------

Attribute code
~~~~~~~~~~~~~~

Attribute code must be only composed of letters, numbers and underscores. No other character will be accepted.

Label columns
~~~~~~~~~~~~~

These columns allows you to define localized label for your attribute.
You will have to add one column per locale. Be sure there are grouped below the **Labels** section (line #4) like this:

+----------------+-----------------------------------------+ 
| Attribute code | Labels                                  |
|                +-------------+-------------+-------------+
|                | en_US       | en_GB       | fr_FR       |
+================+=============+=============+=============+
| code           | label-en_US | label-en_GB | label-fr_FR |
+----------------+-------------+-------------+-------------+
| color          | Color       | Colour      | Couleur     |
+----------------+-------------+-------------+-------------+

**Note** : labels must be under 255 characters.

Attribute type
~~~~~~~~~~~~~~

Attribute type can be: ``Identifier``, ``Text``, ``Text area``, ``Multiple select``, ``Simple select``,
``Price collection``, ``Number``, ``Boolean``, ``Date``, ``File``, ``Image`` and ``Metric``.

These type are definded in the hidden
`attribute type tab <https://github.com/akeneo/ExcelInitBundle/wiki/Attribute-types>`__
attribute\_type. If you are using the `CustomEntityBundle <https://github.com/akeneo/CustomEntityBundle>`__,
this is where you will have to add your new attribute type.

Attribute group
~~~~~~~~~~~~~~~

Select here the associated attribute group code.
Attributes codes are defined in the
`attribute groups <https://github.com/akeneo/ExcelInitBundle/wiki/Attribute-groups>`__ tab.

Sort order
~~~~~~~~~~

The sort order is an integer defining the display order in the attribute group on the product edit form.

Is unique
~~~~~~~~~

Choose if the attribute must have unique values.

Is localizable
~~~~~~~~~~~~~~

Choose if the attribute is localizable or not.

Specific to locales
~~~~~~~~~~~~~~~~~~~

Define here the list of comma-separated locales.

Is scopable
~~~~~~~~~~~

Choose if the attribute is scopable or not.

Minimum input length
~~~~~~~~~~~~~~~~~~~~

Determines how many characters should be typed for select attributes before an option is presented.
This should be used for attributes which have a large number of options

Useable as grid filter
~~~~~~~~~~~~~~~~~~~~~~

Choose if the attribute is useabe as grid filter or not.

Properties for text attributes
------------------------------

Max characters
~~~~~~~~~~~~~~

Max characters is an integer defining how many characters maximum can be entered in a text field.

Validation rule
~~~~~~~~~~~~~~~

Validation rule can be ``email``, ``url`` or ``regexp``.

Validation regexp
~~~~~~~~~~~~~~~~~

If validation rule is *regexp*, use this column to define the regular expression that will be used for validation.

Rich text
~~~~~~~~~

Choose if the text field will be using a `TinyMCE WYSIWYG editor <http://www.tinymce.com/>`__,
allowing rich text possibilities.

Properties for number attributes
--------------------------------

Minimum number
~~~~~~~~~~~~~~

Specify here the minimum number.

Maximum number
~~~~~~~~~~~~~~

Specify here the maximum number.

Decimals allowed
~~~~~~~~~~~~~~~~

Specify here if the numbers can only be integers or not.

Negative allowed
~~~~~~~~~~~~~~~~

Specify here if negative numbers are allowed.

Properties for date attributes
------------------------------

Minimum date
~~~~~~~~~~~~

Specify here the minimum date users can input.

Maximum date
~~~~~~~~~~~~

Specify here the maximum date users can input.

Properties for metric attributes
--------------------------------

Metric family
~~~~~~~~~~~~~

Choose here the metric family. Available options are: ``Area``, ``Binary``, ``Frequency``, ``Length``,
``Power``, ``Speed``, ``Temperature``, ``Volume``, ``Weight``.

Metric families are defined in the hidden `metric types <https://github.com/akeneo/ExcelInitBundle/wiki/Metric-types>`__
tab.

Default metric unit
~~~~~~~~~~~~~~~~~~~

Choose here the default metric unit.

Metric units are defined in the hidden `metric units <https://github.com/akeneo/ExcelInitBundle/wiki/Metric-units>`__
tab.

Properties for file attributes
------------------------------

Max file size
~~~~~~~~~~~~~

Define here the maximum file size in MB.

Allowed extensions
~~~~~~~~~~~~~~~~~~

Insert the allowed extensions, separated by a comma.

For example : ``jpg``, ``jpeg``, ``png`` or ``pdf``.
