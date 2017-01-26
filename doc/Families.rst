Family tabs
===========

Case of families is special because you will have as many family tabs as you have families.
Each of them must be named like ``family family_code``.

Family code
-----------

Family codes must be only composed of letters, numbers and underscores. No other character will be accepted.

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

See `attribute code <https://github.com/akeneo/ExcelInitBundle/wiki/Attributes#attribute-code>`__ in the attribute tab.

Use as label
------------

Indicate (``0``/``1``) whether or not the attribute should be used as a label for the family.
Note that this only concern text attributes.

Completeness channel\_code
--------------------------

Define here if the attribute is part of the completeness calculation for the channel\_code channel.
Channels are defined in the `channel tab <https://github.com/akeneo/ExcelInitBundle/wiki/Channels-tab>`__.
Learn more about completeness in the `user guide <http://www.akeneo.com/doc/user-guide/key-concepts/completeness/>`__.

You will have to add as many Completeness column as you have channels.
