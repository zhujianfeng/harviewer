<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>HTTP Archive Viewer @VERSION@</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<body class="harBody">
	<input type="button" id="reload" value="重新加载" />
	<input type="button" id="move" value="移动" />
	<input type="button" id="moveback" value="移回" />
	<div id="wrap1">
    <div id="content" version="@VERSION@" class="harViewer"></div>
    </div>
    <div id="wrap2" style="margin-top:200px;"></div>
    <script src="scripts/jquery.js"></script>
    <script data-main="scripts/harViewer" src="scripts/require.js"></script>
    <link rel="stylesheet" href="css/harViewer.css" type="text/css"/>
    <script>

		
		require(["harViewer"],function(Interface){
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
			Interface.render(["s.har","g.har","z.har"]);
			$("#reload").click(function(){
				Interface.reload(["s.har","g.har"]);
			});
			$("#move").click(function(){
				$("#wrap2").append($("#content"));
				Interface.reload(["s.har","g.har"]);
			});
			$("#moveback").click(function(){
				$("#wrap1").append($("#content"));
				Interface.reload(["z.har","g.har"]);
			});
		});
    </script>
</body>
</html>
