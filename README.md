bolt-evaluatephp
================

Bolt CMS Extension for dynamic PHP evaluation.

Usage:

1. Declare properties for your entries called

  php_phasename

Where <phasename> is any of following:

  * startofhead - after the <head>-tag.
  * aftermeta - after the last <meta [..] >-tag.
  * aftercss - after the last <link [..] >-tag.
  * beforejs - before the first <script [..] >-tag.
  * afterjs - after the last <script [..] >-tag.
  * endofhead - before the </head>-tag.
  * startofbody - after the <body>-tag.
  * endofbody - before the </body>-tag.
  * endofhtml - before the </html>-tag.
  * afterhtml - after the </html>-tag.
  
2. Modify template to allow extension to add code.

Add {{ evaluatephp("<phasename>") }} at desired places.

3. Enable extension in Bolt CMS configuration.
