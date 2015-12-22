<?php
include "jpgraph/src/jpgraph.php";
include "jpgraph/src/jpgraph_scatter.php";	
	
include "titik.php";

include "centroid.php";
 
$graph = new Graph(600,400);
$graph->SetScale("linlin");
 
$graph->img->SetMargin(40,40,40,40);        
$graph->SetShadow();
 
$graph->title->Set("Merah : C1 , Kuning : C2, Biru  : Laris");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
 
$sp2 = new ScatterPlot($datay,$datax);

$sp1 = new ScatterPlot($daty,$datx);
$sp1->mark->SetFillColor("red");
$sp1->mark->SetWidth(8);
 
$graph->Add($sp2);
$graph->Add($sp1);
$graph->Stroke();
?>