<noinclude>This widget adds HTML, javascript and basic CSS to add search capability specifically designed for the front page.

For example:
<pre>
{{#Widget:FPSearch}}
</pre>
[[Category:Widgets]]
</noinclude><includeonly><!--Widget:FPSearch--><form action="/search/" method="get" name="openei-search" class="openei-search form-group"><div class="input-group"><input type="text" maxlength="128" name="q" x-webkit-speech="" class="component-openei-search-query ui-autocomplete-input left form-control" placeholder="Search OpenEI..." aria-label="Search OpenEI" /><span class="input-group-btn"><button type="submit" onclick="pageTracker._trackEvent('Header', 'Click', 'Search Fulltext');" class="fp-searchbtn btn btn-openei-primary" value="Search" title="Search all OpenEI content for this text"><i class="fa fa-search" aria-hidden="true"></i></button></span></div></form></includeonly>
