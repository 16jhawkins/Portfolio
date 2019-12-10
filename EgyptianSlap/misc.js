         // <script type="text/javascript" src="ajax.js"></script>
          var game = new Game();
            var cardCount = 0; //Increment Variable - Card Number
            var middleDeckChildren; // Middle Deck Cards
          
            //------------------
            // ADD CARD FUNCTION
            //------------------
            function addCard()
            {
              // For TESTING purposes only
              //##################################################################
              suitArr=["H","S","D","H"];
              //Function to get Random deck urls
              function fetch_random() {
                var temp_key, keys = [];
                for(temp_key in cardLinkArr) {
                   if(cardLinkArr.hasOwnProperty(temp_key)) {
                       keys.push(temp_key);
                   }
                }
                return cardLinkArr[keys[Math.floor(Math.random() * keys.length)]];
            }
              var newCardElement = "<img src='"+fetch_random() +"' id='middleDeckImg"+cardCount+"' class = 'card"+cardCount+"'>";
              if (cardCount < 5)
              {
                document.getElementById("middleDiv").innerHTML += newCardElement;
                cardCount++;
                middleDeckChildren = document.getElementById('middleDiv').children;
                addListener();
                // In future card will be determined by JSON object passed by server (as seen below)
              }
            }
            //####################################################################
            // Realistically it'd look something like this:
            // var discardPileArr = <?php echo json_encode(discardPileSQLResults);?>
            // for(i=0; i<discardPileArr.length; i++){
            //  var cardKey = "c"+"discardPileArr[i]"; //(example "cAS" = card Ace of Spades) 
            //  var newCardElement = "<img src='"+ cardLinkArr['c'+] +"'/> //Creates the Element to be entered into the Middle Div
            //  document.getElementById("middleDiv").innerHTML += newCardElement; //Appends the new Element
            //  i++; // Increments Loop
            //  middleDeckChildren = document.getElementById('middleDiv').children; //Grabs an array of all the cards Elements in Middle Div
            //  addListener(); // Adds onclick listeners to the newly added card elements (via the array of Elements above)
            //}

            //-------------------------
            //  REMOVE CARDS FUNCTION
            //-------------------------
            // %%% WARNING: Renamed FROM slap() %%%
            function removeCards()
            {
              // This should only be called when the server verifies that a proper slap happened.
              document.getElementById("middleDiv").innerHTML = ""; //empty Middle Div
              cardCount=0;  // set card count to 0.
            }

          var opponentsDeck = document.getElementById("opponentsDeckImg"); // Top Deck Image
          var middleDeck = document.getElementById("middleDiv"); // Bottom Deck Image

            //-----------------------
            // ADD LISTENER FUNCTION
            //-----------------------
            // Adds an onclick listener for the newly created Elements
          function addListener()
          {
            for (var j = 0; j < cardCount; j++)
            {
              middleDeckChildren[j].setAttribute("onclick", "GameSend('F')");
            }
          }
          var playersDeck = document.getElementById("playersDeckImg");
          playersDeck.setAttribute("onclick", "GameSend('S')"); // Set addCard on Player's deck (IN FUTURE: Server will verify before any card is 'flipped' graphically)

          function GameSend(x){
            if(x == 'S'){
              game.send("S");
            }
            else if(x == 'F')
            {
              game.send("F");
            }
          }