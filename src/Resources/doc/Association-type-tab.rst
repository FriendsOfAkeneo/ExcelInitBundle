Association type tab
====================

See `user guide`_ to know more about association types.

Association type code
---------------------

Specify here a code for your association type. Association type code
must be only composed of letters, numbers, spaces and underscores. No
other character will be accepted.

Example: ``X_SELL``, ``UPSELL``, ``SUBSTITUTION``, ``PACK``.

Labels
------

These columns allows you to define localized label for your attribute.
You will have to add one column per locale. Be sure they are grouped
below the Labels section (line #1). Note that the 3rd line is hidden and
you will have to show it in order to add new locales. The following example
is showing this hidden line.

**Example:**

+-------------------------------+---------------------------------------------+ 
| Association type properties   | Labels                                      |
|                               +--------------+--------------+---------------+
|                               | en_US        | es_ES        | fr_FR         |
+===============================+==============+==============+===============+
| Association type code         | label-en_US  | label-es_ES  | label-fr_FR   |
+-------------------------------+--------------+--------------+---------------+
| X_SELL                        | Cross sell   | Venta cruzada| Vente croisée |
+-------------------------------+--------------+--------------+---------------+

.. _user guide: http://www.akeneo.com/doc/user-guide/key-concepts/association/
