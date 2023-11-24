<?php
//print_r($_POST);die();
	if(isset($_POST['selectedFilename'])){
		
		//print_r($_POST);die();
		
		$game_core = $_POST['gameCore'];
		$game_name = $_POST['gameName'];
		$game_url = $_POST['selectedFilename'];
 
		?>
		<link rel="stylesheet" type="text/css" href="css/console.css">
		<span style="color:grey; margin-left:auto;margin-right:auto;">Press F11: Fullscreen On/Off</span><br/>
		<span style="color:orange; font-weight:bold; font-size:1.15em; margin-left:auto;margin-right:auto;"><?=$game_name;?></span><br/>
		<div id="console_window">
		
			<div style="width:640px;height:480px;max-width:100%">
				<div id="game"></div>
			</div>
		</div>
		
		
		<div class="center-link">
		  <a href="index.php">
			<img src="imgs/rustycraft_return.png" alt="Return to Selection">
		  </a>
		</div>	
		
        <script>
            EJS_player = "#game";
            EJS_core = "<?=$game_core;?>";
            EJS_gameName = "<?=$game_name;?>";
            EJS_color = "#0064ff";
			EJS_pathtodata =  "data/";            
            
			EJS_gameUrl = "games/<?=$game_core;?>/<?=$game_url?>";
        </script>
		
        <script src="js/loader.js"></script>
				
		<?php
			die();
	} ?>
 
 
 <html> 
	<head>
		<title></title>
	</head>

 <body>


<form id="gameForm" action="index.php" method="post">
  <!-- Core Selection -->
  <select id="coreList" name="core" onchange="updateGameList()">
    <option value="">Select Core</option>
    <option value="gba">Game Boy Advance</option>
    <option value="snes">Super Nintendo Entertainment System</option>
    <!-- More cores can be added here -->
  </select>

  <!-- Game Selection, initially empty -->
  <select id="gameList" name="selectedFilename" onchange="updateForm()" disabled>
    <!-- Options will be loaded based on core selection -->
  </select>

  <input type="hidden" id="gameName" name="gameName" value="" />
  <input type="hidden" id="gameCore" name="gameCore" value="" />
  <input type="submit" value="Play Game" disabled>
</form>



<script>
		// This function is called when the core is selected
		function updateGameList() {
		  var coreSelect = document.getElementById('coreList');
		  var gameSelect = document.getElementById('gameList');
		  var submitButton = document.querySelector('#gameForm input[type="submit"]');
		  
		  // Enable the game select and submit button
		  gameSelect.disabled = false;
		  submitButton.disabled = false;

		  // Set the core value in the hidden input
		  document.getElementById('gameCore').value = coreSelect.value;

		  // Clear the previous options
		  gameSelect.innerHTML = '';

		  // Depending on the core, populate the game select with options
		  if (coreSelect.value === 'gba') {
			gameSelect.innerHTML = `
			  <option value="Breath of Fire (U) [!].gba">Breath Of Fire</option>
			  <option value="Breath of Fire II (U) [!].gba">Breath Of Fire 2</option>
				<option value="Castlevania - Aria of Sorrow (U) [!].gba">Castlevania: Aria Of Sorrow</option>
				<option value="DemiKids - Dark Version (U) [!].gba">DemiKids</option>
				<option value="DemiKids - Light Version (U) [!].gba">DemiKids</option>
				<option value="Dragon Ball Z: Buu\'s Fury">Dragon Ball Z: Buu's Fury</option>
				<option value="Final Fantasy 5 Advance">Final Fantasy 5 Advance</option>
				<option value="Final Fantasy I & II - Dawn of Souls (U).gba">Final Fantasy 1 & 2: Dawn Of Souls</option>
				<option value="Final Fantasy 6 Advance">Final Fantasy 6 Advance</option>
				<option value="Final Fantasy IV Advance (U).gba">Final Fantasy 4 Advance</option>
				<option value="Final Fantasy Tactics Advance (U) [!].gba">Final Fantasy Tactics Advance</option>
				<option value="Fire Emblem (U) [!].gba">Fire Emblem</option>
				<option value="Golden Sun (UE) [!].gba">Golden Sun</option>
				<option value="Kingdom Hearts - Chain of Memories (U).gba">Kingdom Hearts: Chain Of Memories</option>
				<option value="Lufia - The Ruins of Lore (U) [!].gba">Lufia: The Ruins Of Lore</option>
				<option value="Lunar Legend (U) [!].gba">Lunar Legend</option>
				<option value="Mario & Luigi - Superstar Saga (U).gba">Mario And Luigi: Superstar Saga</option>
				<option value="Mother 3 (English Translation v1.3).gba">Mother 3</option>
				<option value="Pokemon - Fire Red Version (U) (V1.1).gba">Pokemon FireRed</option>
				<option value="Pokemon - Leaf Green Version (U) (V1.1).gba">Pokemon LeafGreen</option>
				<option value="Riviera - The Promised Land (U).gba">Riviera: The Promised Land</option>
				<option value="Sword of Mana (U) [!].gba">Sword Of Mana</option>
				<option value="Tactics Ogre - The Knight of Lodis (U) [!].gba">Tactics Ogre: The Knight Of Lodis</option>
			`;
		  } else if (coreSelect.value === 'snes') {
			gameSelect.innerHTML = `      
			  <option value="7th Saga, The (U) [!].smc">7th Saga, The</option>
			  <option value="Breath of Fire II.smc">Breath of Fire II</option>
			  <option value="Breath of Fire.smc">Breath of Fire</option>
			  <option value="Chrono Trigger.smc">Chrono Trigger</option>
			  <option value="EarthBound.smc">EarthBound</option>
			  <option value="Final Fantasy IV (J).smc">Final Fantasy IV</option>
			  <option value="Harvest Moon.smc">Harvest Moon</option>
			  <option value="Illusion of Gaia.smc">Illusion of Gaia</option>
			  <option value="Lufia II - Rise of the Sinistrals.smc">Lufia II - Rise of the Sinistrals</option>
			  <option value="Ogre Battle - The March of the Black Queen.smc">Ogre Battle - The March of the Black Queen</option>
			  <option value="Secret of Evermore.smc">Secret of Evermore</option>
			  <option value="Secret of Mana.smc">Secret of Mana</option>
			  <option value="Shadowrun.smc">Shadowrun</option>
			  <option value="Soul Blazer.smc">Soul Blazer</option>
			  <option value="Super Mario RPG - Legend of the Seven Stars.smc">Super Mario RPG - Legend of the Seven Stars</option>
			`;
		  }
		  
		  // Add more else if blocks for other cores
		}

		// This function is called when the game is selected
		function updateForm() {
			var gameSelect = document.getElementById('gameList');
			var gameNameInput = document.getElementById('gameName');
		  
			// Set the game name value in the hidden input
			if (gameSelect.selectedIndex >= 0) { // Check if any game is selected
				gameNameInput.value = gameSelect.options[gameSelect.selectedIndex].text;
				// No need to set selectedFilename as it is automatically set by the value of the select option
			}
		}

		// Add an event listener to the core selection to update the game list
		document.getElementById('coreList').addEventListener('change', updateGameList);

		// Add an event listener to the game selection to update the game name
		document.getElementById('gameList').addEventListener('change', updateForm);
		
</script>

</body>
</html>
