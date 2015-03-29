<script type="text/javascript">
xinha_editors = null;
    xinha_init    = null;
    xinha_config  = null;
    xinha_plugins = null;

    // This contains the names of textareas we will make into Xinha editors
    xinha_init = xinha_init ? xinha_init : function()
    {
      /** STEP 1 ***************************************************************
       * First, what are the plugins you will be using in the editors on this
       * page.  List all the plugins you will need, even if not all the editors
       * will use all the plugins.
       *
       * The list of plugins below is a good starting point, but if you prefer
       * a must simpler editor to start with then you can use the following 
       * 
       * xinha_plugins = xinha_plugins ? xinha_plugins : [ ];
       *
       * which will load no extra plugins at all.
       ************************************************************************/

      xinha_plugins = xinha_plugins ? xinha_plugins :
      [
       'ContextMenu',
       'FullScreen',
       'SpellChecker',
	  'ExtendedFileManager',
	   'ListType',
		'GetHtml',
		'CharacterMap',
       'TableOperations',
	   'Stylist'
      ];
             // THIS BIT OF JAVASCRIPT LOADS THE PLUGINS, NO TOUCHING  :)
             if(!HTMLArea.loadPlugins(xinha_plugins, xinha_init)) return;



      /** STEP 3 ***************************************************************
       * We create a default configuration to be used by all the editors.
       * If you wish to configure some of the editors differently this will be
       * done in step 5.
       *
       * If you want to modify the default config you might do something like this.
       */
         xinha_config = new HTMLArea.Config();
		xinha_config.toolbar =
  [
  //  ["popupeditor"],
    ["separator","formatblock","fontsize","bold","italic","underline","strikethrough"],
    ["separator","subscript","superscript"],
    ["linebreak","separator","justifyleft","justifycenter","justifyright","justifyfull"],
    ["separator","insertorderedlist","insertunorderedlist","outdent","indent"],
    ["separator","inserthorizontalrule","createlink","insertimage","inserttable"],
    ["separator","undo","redo","selectall","print"], (HTMLArea.is_gecko ? [] : ["cut","copy","paste","overwrite","saveas"]),
    ["separator","killword","clearfonts","removeformat","toggleborders"],
    ["separator","htmlmode","showhelp"]
  ];
		

       ************************************************************************/

      xinha_editors   = HTMLArea.makeEditors(xinha_editors, xinha_config, xinha_plugins);


      HTMLArea.startEditors(xinha_editors);
    }

    window.onload = xinha_init;
	</script>