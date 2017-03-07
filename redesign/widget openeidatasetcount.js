<noinclude>This widget performs an AJAX request to return OpenEI's dataset count.  Used for homepage stats.

For example:
<pre>
{{#Widget:OpenEIDatasetCount}}
</pre>
[[Category:Widgets]]
</noinclude><includeonly><!--Widget:OpenEIDatasetCount--><span class="oei-data-count"></span><script type="text/javascript">$( document ).ready(function() {$.getJSON('http://en.openei.org/datasets/api/search/dataset', function (data) {var dataCount = data.count; $('.oei-data-count').html(dataCount);});});</script></includeonly>
