jQuery(' #da-thumbs > li ').each( function() { jQuery(this).hoverdir(); } );

// this is important for IEs
var polyfilter_scriptpath = '/js/';
var lastClass;

if(pluginSetting.all == "0")
{
  ShowLists(pluginSetting.initialClass);
}

function ShowLists(listname,tag)
{
  if(listname == "all")
  {
    jQuery('.da-thumbs-'+tag+' .waving-item').show("fast");
  }
  else if(listname != lastClass)
  {
    jQuery('.da-thumbs-'+tag+' .waving-item').hide();
    jQuery('.da-thumbs-'+tag+' .waving-'+listname).show("slow");
  }
  
  lastClass = listname;
}

// Initiate light box
jQuery(document).ready(function(){
    base_url = document.location.href.substring(0, document.location.href.indexOf('index.html'), 0);

        jQuery(".lightbox").lightbox({
            fitToScreen: true,
            imageClickClose: false
    });

        jQuery(".lightbox-2").lightbox({
            fitToScreen: true,
            scaleImages: true,
            xScale: 1.2,
            yScale: 1.2,
            displayDownloadLink: true
    });

        jQuery(".lightbox-json").lightbox({
            fitToScreen: true,
            jsonData: new Array(
                {url: base_url + 'images/image-0.jpg', title: 'Image 1 loaded using JSON data' },
                {url: base_url + 'images/image-1.jpg', title: 'Image 2 loaded using JSON data' },
                {url: base_url + 'images/image-2.jpg', title: 'Image 3 loaded using JSON data' },
                {url: base_url + 'images/image-3.jpg', title: 'Image 4 loaded using JSON data' }
        ),
        loopImages: true,
        imageClickClose: false,
        disableNavbarLinks: true
    });

	// Center the parent div of the portfolio lists
	jQuery("#da-thumbs").parent().css("text-align","center");
	
	// Initialize dim
	//jQuery("#waving-dim").css("height", jQuery(document).height());
});