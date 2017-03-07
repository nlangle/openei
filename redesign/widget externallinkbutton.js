<noinclude>
Bootstrap styled button for launching links in a new browser tab (_blank)

Use [[Widget:LinkButton]] for launching a link in the same target/browser tab.

=====Parameters Include:=====
*'''action''' - url to link to
*'''value'''  - button text
*'''class'''  - add additional css classes, separate multiple classes with spaces (i.e.- btn-primary)
*'''style'''  - add style elements, cannot change button color with this (optional)

=====Examples=====
Default Button
{{#Widget:ExternalLinkButton | action=http://www.thefwa.com | value=Visit FWA}}
<pre>
{{#Widget:ExternalLinkButton | action=http://www.thefwa.com | value=Visit FWA}}
</pre>




Primary Button
{{#Widget:ExternalLinkButton | action=http://www.thefwa.com | value=Visit FWA | class=btn-primary}}
<pre>
{{#Widget:ExternalLinkButton | action=http://www.thefwa.com | value=Visit FWA | class=btn-primary}}
</pre>
[[Category:Widgets]]
</noinclude>
<includeonly>
<!--Widget:ExternalLinkButton-->
<div class="btn <!--{$class|default:'btn-default'|escape:'html'}-->" target="_blank" action="<!--{$action|default:''|escape:'html'}-->" onclick="window.open('<!--{$action|default:''|escape:'html'}-->')" style="<!--{$style|default:''|escape:'html'}-->"><!--{$value|default:'Go'|escape:'html'}--></div>
<script type="text/javascript">
  $(function() {$("#blankTarget a").attr("target", "_blank");});
</script>
</includeonly>
