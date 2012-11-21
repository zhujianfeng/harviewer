<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>HTTP Archive Viewer @VERSION@</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body class="harBody">
	<input type="button" id="reload" value="重新加载" />
    <div id="content" version="@VERSION@"></div>
    <script src="scripts/jquery.js"></script>
    <script data-main="scripts/harViewer" src="scripts/require.js"></script>
    <link rel="stylesheet" href="css/harViewer.css" type="text/css"/>
    <script>
		$("#content").bind("onViewerPreInit", function(event)
		{
		    // Get application object
		    var viewer = event.target.repObject;
			viewer.removeTab("Home");
		    viewer.removeTab("DOM");
		    viewer.removeTab("About");
		    viewer.removeTab("Schema");

		    // Hide the tab bar
		    viewer.showTabBar(false);
		    // Remove toolbar buttons
		    var preview = viewer.getTab("Preview");
		    preview.showStats(false);
		    preview.toolbar.removeButton("download");
		    preview.toolbar.removeButton("clear");
		    preview.toolbar.removeButton("showTimeline");
		    preview.toolbar.removeButton("showStats");

		    //viewer.loadHar("z.har");
		});
		require(["harViewer"],function(Interface){
			Interface.render("z.har");
			$("#reload").click(function(){
				Interface.reload("http://10.36.20.36:8080/test.json",{jsonp:true});
			});
		});
    </script>
</body>
</html>
