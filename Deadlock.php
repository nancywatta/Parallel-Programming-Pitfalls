<!DOCTYPE html>
<html>





<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Deadlock</title>

<!-- CSS that define GUI components -->
<link rel="stylesheet" href="data/style.css" type="text/css" media="screen">

<!-- all scripts required in this page -->
<script src="ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script src="./scripts/deadlock.js" type="text/javascript"></script>
</head>





<body onclick="Freeze()">
	<div id="dialogoverlay">
	</div>
	<div id="dialogbox">
		<div>
			<div id="dialogboxhead"></div>
			<div id="dialogboxbody"></div>
			<div id="dialogboxfoot"></div>
		</div>
	</div>
	
	
	<div id="main">
		<!-- Header:  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
		<div id="header">
			<h1>
				<center>Parallel Programming Pitfalls</center>
			</h1>
			<h2>
				<center>Deadlock</center>
			</h2>
			
			<button id="disable"
				style="font-family: Comic Sans MS; background-color: #E96D63; color: #000000; font-size: 10pt;"
				onclick="window.location.href='HighlyContentedLock.php'">Solution?</button>

			<span style="float: right;"> <a href="Home.php"
				style="color: #CC0000"><right> HOME </right></a>
			</span>

		</div>
		<!-- @ Header ends here +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

		<div id="content">
			<!-- Shared Resource section -->
			<div id="resources">
				<center>
					Shared &nbsp;&nbsp; Resources:&nbsp;&nbsp; 
					
					<span id="Q1" style="color: #7FCA9F">Q1</span>&nbsp;&nbsp; 
					<span id="Q2" style="color: #7FCA9F">Q2</span>&nbsp;&nbsp; 
					<span id="Q3" style="color: #7FCA9F">Q3</span>&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp; Locks:&nbsp;&nbsp; 
					<span id="L1" style="color: #7FCA9F">L1</span>&nbsp;&nbsp; 
					<span id="L2" style="color: #7FCA9F">L2</span>&nbsp;&nbsp; 
					<span id="L3" style="color: #7FCA9F">L3</span>
				</center>
			</div>
			<!-- @ Shared Resource section ends here -->
			
			<!-- Left section starts here -->
			<div id="left">

				<h3>Processor 1: Bob (Thread 1)</h3>
				<br />
				<h3>
					QUESTION: &nbsp;&nbsp;&nbsp;&nbsp; <span id="BobQ1"
						style="visibility: hidden; color: #7FCA9F">Q1</span> <span
						id="BobQ2" style="visibility: hidden; color: #7FCA9F"> , Q2</span>
				</h3>
				<br />
				<form name="userForm">
					<div id="p1-question">
						<input type="text" name="question"
							style="width: 300px; height: 50px; font-family: Comic Sans MS; font-size: 15pt; color: blue; background-color: rgb(136, 162, 168)" readonly="readonly"></input>
					</div>
					
					<br /> <br /> 
					<input type="text" name="answer"
						style="width: 200px; height: 30px;"></input> 
						
					<br /> <br /> 
					<input type="button" onclick="nextQuest()" value="Submit" name="submit" disabled="disabled" style=" "> </input>

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
					
					<input type="button" id="lockbutton" disabled="disabled" name="lockbutton" value="Lock Next Question" onclick="nextLock()" style="visibility: hidden;  "> </input>

				</form>
				<br /> <br /> <br />
				
				<div id="load-game">
					<form name="load">
						<input type="button" onclick="loadGame()"
							value="Load Game & Lock The First Question" name="loadButton"
							style=" "> </input>
					</form>
				</div>
				
				<br /> 
				<img id="lockImage1" src="data/Lock.jpg" width="80" height="80" title="L1" alt="L1" align="left" style="visibility: hidden;" />
				<img id="lockImage3" src="data/Lock.jpg" width="80" height="80" title="L2" alt="L2" align="left" style="visibility: hidden;" />
				
				<br /> <br /> <br /> <br /> <br /> <br />
			</div>
			<!-- @ Left section ends here -->
			
			<!-- Thread 1 playGame1() -->
			<div id="middleLeft">
				<br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
				<h2>
					<div id="analogy" style="color: #FFF400; visibility: hidden;">
						<span style="float: left">playGame1() { </span> 
						<br /> 
						<span id="arrow">&rarr;</span><span id="text1">&nbsp;&nbsp; Lock Q1;</span>
						<br /> 
						<span id="arrow1" style="visibility: hidden;">&rarr;</span>
						<span id="Bob1">&nbsp;&nbsp; Answer Q1;</span> 
						<br /> 
						<span id="arrow2" style="visibility: hidden;">&rarr;</span>
						<span id="Bob2">&nbsp;&nbsp; Lock Q2;</span> 
						<br /> 
						<span id="arrow3" style="visibility: hidden;">&rarr;</span>
						<span id="Bob3">&nbsp;&nbsp; Answer Q2;</span> 
						<br /> 
						<span id="arrow4" style="visibility: hidden;">&rarr;</span>
						<span id="Bob4">&nbsp;&nbsp; Lock Q3;</span> 
						<br /> 
						<span id="text3" style="float: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Answer Q3;</span> 
						<br /> 
						<span style="float: left">&nbsp;&nbsp; UnLock Q3;</span> 
						<br /> 
						<span style="float: left">&nbsp;&nbsp; UnLock Q2;</span> 
						<br /> 
						<span style="float: left">&nbsp;&nbsp; UnLock Q1;</span> 
						<br /> 
						<span style="float: left">} </span>
					</div>
				</h2>
				<br />
			</div>
			<!-- @ Thread 1 playGame1() ends here-->
			
			<!-- Thread 2 playGame2() -->
			<div id="middleRight">
				<br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
				<h2>
					<div id="analogy2" style="color: #FFFFF; visibility: hidden;">
						<span style="float: left">playGame2() { &nbsp;&nbsp;&nbsp;&nbsp;</span>
						<br /> 
						<span id="text4" style="float: left">&nbsp;&nbsp; Lock Q3;</span>
						<br /> 
						<span id="VP1" style="float: left">&nbsp;&nbsp; Answer Q3;</span>
						<br /> 
						<span id="VP2" style="float: left">&nbsp;&nbsp; Lock Q1;</span>
						<br /> 
						<span style="float: left">&nbsp;&nbsp; Answer Q1;</span> 
						<br />
						<span style="float: left">&nbsp;&nbsp; Lock Q2;</span> 
						<br /> 
						<span style="float: left">&nbsp;&nbsp; Answer Q2;</span> 
						<br /> 
						<span style="float: left">&nbsp;&nbsp; UnLock Q2;</span> 
						<br /> 
						<span style="float: left">&nbsp;&nbsp; UnLock Q1;</span> 
						<br /> 
						<span style="float: left">&nbsp;&nbsp; UnLock Q3;</span> 
						<br /> 
						<span style="float: left"> }&nbsp;&nbsp;&nbsp;&nbsp; </span>
					</div>
				</h2>
				<br />
			</div>
			<!-- @ Thread 2 playGame2() ends here-->
			
			<!-- Right section -->
			<div id="right">

				<h3>Processor 2: Virtual Player (VP) (Thread 2)</h3>
				<br />
				<h3>
					QUESTION:&nbsp;&nbsp;&nbsp;&nbsp; 
					<span id="VPQ3" style="visibility: hidden; color: #7FCA9F">Q3</span>
				</h3>
				
				<br />
				<form name="vpForm">
					<input type="text" name="question"
						style="width: 300px; height: 50px; font-family: Comic Sans MS; font-size: 15pt; color: blue; background-color: rgb(100, 140, 140);"
						readonly="readonly"></input> 
					
					<br /> <br /> <br /> 
					<input type="text" name="answer" style="width: 200px; height: 30px;" readonly="readonly"></input> <br /> <br /> <input type="button" value="Submit" disabled="disabled" style="  font-family: Comic Sans MS;"> </input>
					
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<button id="lockbutton2" disabled="disabled" style="visibility: hidden; font-size: 10pt; font-family: Comic Sans MS;"> Lock Next Question</button>
				</form>
				
				<br /> <br /> <br />
				<div id="load-game">
					<form>
						<input type="button" onclick="loadGame()" value="Load Game & Lock The First Question" disabled="disabled" style="  font-family: Comic Sans MS;"> </input>
					</form>
				</div>
				
				<br /> 
				<img id="lockImage2" src="data/Lock.jpg" width="80" height="80" title="L3" alt="L3" align="left" style="visibility: hidden;" /> 
				<br /> <br /> <br /> <br /> <br /> <br />
			</div>
		</div>
		<!-- @ Right section ends here -->

		<!-- footer begins here: ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
		<div id="footer">
				<div id="footer-uoa">		
						University Of Auckland , Software Engineering.
				</div>
				<div id="footer-author">
					Team: Victor, Nancy, Aravind
				</div>
			</div>
		<!-- footer ends here: ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
	</div>
</body>
</html>