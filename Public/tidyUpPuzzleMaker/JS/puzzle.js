//puzzle
var puzzle;

function initArray(){
    puzzle = new Array(9);
	for(i = 0; i < 9; i++){
		puzzle[i] = new Array(9);
	}

	for(i = 0 ; i < 9; i++){
		for(j = 0; j < 9; j++){
			puzzle[i][j] = 1;
		}
	}

}

//once click a cell
function selectCell(id){
	if(id != null){
		var selectedCell = document.getElementById(id);
		var pos = id.split("#");
		var value = puzzle[pos[0]-1][pos[1]-1];
		if(value == 0){
			selectedCell.src = "IMG/Croissants.png";
			puzzle[pos[0]-1][pos[1]-1] = 1;
		}else if (value == 1){
			selectedCell.src = "IMG/empty.png";
			puzzle[pos[0]-1][pos[1]-1] = 0;
		}
	}
}


//return for generating json
function finalArray(){
	return puzzle;
}