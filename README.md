bolt-evaluatephp
================

Bolt CMS Extension for dynamic PHP evaluation.

Installation
============
Copy contents into app/extensions/evaluatephp folder.

Usage
=====

1. Declare properties for your entries called
	
	php_phasename

Where phasename is any of following:

  * startofhead - after the &lt;head&gt;-tag.
  * aftermeta - after the last &lt;meta [..]&gt;-tag.
  * aftercss - after the last &lt;link [..]&gt;-tag.
  * beforejs - before the first &lt;script [..]&gt;-tag.
  * afterjs - after the last &lt;script [..]&gt;-tag.
  * endofhead - before the &lt;/head&gt;-tag.
  * startofbody - after the &lt;body&gt;-tag.
  * endofbody - before the &lt;/body&gt;-tag.
  * endofhtml - before the &lt;/html&gt;-tag.
  * afterhtml - after the &lt;/html&gt;-tag.
  
2. Modify template to allow extension to add code.

Add {{ evaluatephp("phasename") }} at desired places.

3. Enable extension in Bolt CMS configuration.

Add EvaluatePHP to list of extensions.
