Attribute options tab
=====================

Attributes options are the possibilities of choices for simple and multi select attributes.

Attribute code
--------------

Specify here the attribute code for which you want to append the option.

Option code
-----------

Specify here a code for your attribute option.
Attribute option codes must be only composed of letters, numbers, spaces and underscores.
No other character will be accepted.

Examples: ``blue``, ``XL``, ``silk``.

Localizable labels
------------------

These columns allows you to define localized label for your attribute.
You will have to add one column per locale. Be sure they are grouped
below the Labels section (line #1).

The 3rd line is hidden, you will have to show it if you want to add
other locales. The following example assume you are showing this line.

**Example:**


+------------------------------+---------------------------------------------+ 
| Options properties           | Labels                                      |
|                              +--------------+--------------+---------------+
|                              | en_US        | es_ES        | fr_FR         |
+================+=============+==============+==============+===============+
| Attribute code | Option code | label-en_US  | label-es_ES  | label-fr_FR   |
+----------------+-------------+--------------+--------------+---------------+
| color          | blue        | Blue         | Azul         | Bleu          |
+----------------+-------------+--------------+--------------+---------------+
| color          | red         | Red          | Rojo         | Rouge         |
+----------------+-------------+--------------+--------------+---------------+
