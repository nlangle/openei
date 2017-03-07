<noinclude>__NOTOC__
This widget creates a button, which will allow the user to print the target page to PDF.  When used on a category page, all pages in the category will be printed.

=====Parameters=====
''No paramteres''


=====Dependencies=====
[[Template:PrintPDFButton]]

=====Usage=====
This Widget assumes the existence of HTML elements created by the [[Template:PrintPDFButton|PrintPDFButton template]], and is called via that template.
<pre>
{{PrintPDFButton}}
</pre>


=====Example=====
{{PrintPDFButton}}
''(displays in the upper right corner of the page)''

[[Category:Widgets]]
</noinclude><includeonly>
<!--Widget:PrintPDFButton-->
<style>
#printPDFButton {
  display: block !important;
  float: right;
  height: 37px;
  width: 37px;
  margin: 8px 0 8px 8px;
  padding: 6px 9px;
  font-size: 1.5em;
  color: #e5e5e5;
  border-radius: 50%;
  background: rgba(0,0,0,0.1);
  box-shadow: 0 1px 1px 0 rgba(0,0,0,0.3);
  transition: background 0.2s,color 0.2s;
  -webkit-transition: background 0.2s,color 0.2s;
}

#printPDFButton .print {
  position: relative;
  top: -1px;
  color: #777;
}

#printPDFButton:focus, #printPDFButton:hover, #printPDFButton:focus .print, #printPDFButton:hover .print {
  background: #e5e5e5;
  color: #007680;
}

#printPDFButton:active, #printPDFButton:active .print {
  background: #007680;
  color: #e5e5e5;
}
</style>

<script type="text/javascript">
  $(document).ready(function(){$('.MediaTransformError').hide();
    var iHTML = $('#printPDFButton').html();
    var $a = $("<a style='text-decoration: none !important;' href='http://en.openei.org/services/api/printpdf?page="+encodeURIComponent(document.URL)+"?print=pdf' rel='nofollow' target='_blank'>PrintPDF</a>");
    $a.html(iHTML);
    $('#printPDFButton').html($a);

    $("a").each(function(){
      var href = $(this).attr('href');
      if (href){
        var no_proto = href.match('^\s*(//.*)');
        if (no_proto){
          $(this).attr('href',location.protocol + no_proto[1]);
        } else {
          var no_domain = href.match('^\s*(/.*)');
          if (no_domain){
             $(this).attr('href', location.protocol + '//' + document.domain + no_domain[1]);
          }
      }
      }
    });
  });
</script><!--End Widget-->
</includeonly>
