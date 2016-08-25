Family tabs
===========

Case of families is special because you will have as many family tabs as
you have families. Each of them must be named like
``family family_code``.

Another particularity is than you can define attributes in this tab just
the way it is achieved in the `attribute
tab <https://github.com/akeneo/ExcelInitBundle/wiki/Attributes>`__.
Common columns between families tabs and attriubte tab won't be
explained. Please refer `attribute
tab <https://github.com/akeneo/ExcelInitBundle/wiki/Attributes>`__
for more details.

Attributes defined here will be useable in every family.

If your attributes are defined in the attribute tab, you will only have
to fill **Attribute code**, **Use as label**, and **Completeness
columns**. Just be sure not to define more than once your attribute. An
error message will be triggered otherwise.

Also note that you can mix full attribute definition and attribute list
in this tab.

Family code
-----------

Family codes must be only composed of letters, numbers, spaces and
underscores. No other character will be accepted.

Localized label
---------------

You can specify a different label for each locale.

+-------+--------+-----------+-----------+ 
|       | en_US  | es_ES     | fr_FR     |
+=======+========+===========+===========+
| Label | Main   | Principal | Principal |
+-------+--------+-----------+-----------+


Attribute code
--------------

See `attribute
code <https://github.com/akeneo/ExcelInitBundle/wiki/Attributes#attribute-code>`__
in the attribute tab.

Use as label
------------

Indicate (``0``/``1``) whether or not the attribute should be used as a
label for the family. Note that this only concern text attributes.

Completeness channel\_code
--------------------------

Define here if the attribute is part of the completeness calculation for
the channel\_code channel. Channels are defined in the `channel
tab <https://github.com/akeneo/ExcelInitBundle/wiki/Channels-tab>`__.
Learn more about completeness in the `user
guide <http://www.akeneo.com/doc/user-guide/key-concepts/completeness/>`__.

You will have to add as many Completeness column as you have channels.
