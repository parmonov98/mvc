const getMe = (word) => {
    let blank = document.getElementById('empty');
    /*
        let idText = document.getElementById('empty').nextElementSibling.id;

        let patt = /[0-9]+/;
        let id = idText.match(patt);
        id--;
        blank.id = "id" + id;
    */
    blank.setAttribute("onclick", "getMeBack(this)");
    blank.innerHTML = word.innerHTML;
    blank.classList.remove("inactive");
    let parent = word.parentNode;
    parent.removeChild(word);
    console.log(blank.innerHTML);
}




const getMeBack = (word) => {
    let options = document.getElementById('options');
    let option = word.cloneNode(true);
    word.classList.add("inactive");
    word.innerHTML = '';
    word.id = 'empty';

    option.className = "option";
    option.setAttribute("onclick", "getMe(this)");
    options.appendChild(option);




    console.log(word.innerHTML);
}



const reset = () => {
    location.reload();
}


const check = (senID) => {
        let answer = document.getElementById("empty").innerHTML;
        console.log(answer);
        let idText = document.getElementById('empty').nextElementSibling;
        let id=0;
        if(idText == null){
            idText = document.getElementById('empty').previousElementSibling.id;
            

            let patt = /[0-9]+/;
            id = idText.match(patt);
            id++;
            alert(id);
        }else{
            idText = idText.id;
            let patt = /[0-9]+/;
            id = idText.match(patt);
            id--;
        }
        

        	
		const ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function (){
			switch(ajax.readyState){
			case 0: 
				console.log('0.request initialized!');
			break;
			case 1: 
				console.log('1.connection established!');
			break;
			case 2: 
				console.log('2.request received !');
			break;
			case 3: 
				console.log('3.processing request!');
			break;
			case 4: 
				console.log('4.request finished and response is ready!');
			if(ajax.status == 200){
				
				console.log('Everything is OK!');
				if(ajax.responseText != 0){
                    alert("Вы распознали замысел автора");
                    let actions = document.getElementById("actions");
                    let nextBtn = document.createElement("button");
                    nextBtn.innerText = "Следующее задание";
                    actions.appendChild(nextBtn);
                    nextBtn.setAttribute("onclick", "nextTask('"+senID+"')");
                    
					console.log(ajax.responseText);
                    printStat(ajax.responseText);
                }else{
                    alert("Увы, но автор думал иначе");
                }
				
								
			}else{
				console.log(ajax.status);
				console.log('\nThere is an error. it seems the requested file does not exist!');
			}
			break;
		}
		}
        let data = 'answer=' + answer + '&order=' + id + '&id=' + senID; 
        
        ajax.open('POST', 'http://task.lc/ajax/check.php', true); 
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send(encodeURI(data));
    }

    const nextTask = (id) => {
        let nextid = parseInt(id) + 1
        window.location.href = "http://task.lc/?page=board&id="+nextid;
    }

    const printStat = (data) => {
        let stats = JSON.parse(data);
		let games = stats.length;
        
        let stat = document.getElementById("stats");
		
		let table = document.createElement("table");
		let tr1 = document.createElement("tr");
		let th = document.createElement("th");
		th.innerHTML = "#";
		let th1 = document.createElement("th");
		th1.innerHTML = "Matches";
		let th2 = document.createElement("th");
		th2.innerHTML = "Wins";
		let th3 = document.createElement("th");
		th3.innerHTML = "Loses";
		let th4 = document.createElement("th");
		th4.innerHTML = "Action";
		tr1.appendChild(th);
		tr1.appendChild(th1);
		tr1.appendChild(th2);
		tr1.appendChild(th3);
		tr1.appendChild(th4);
		table.appendChild(tr1);
		
		
		
		for(let i = 0; i < stats.length; i++){
			let tr = document.createElement("tr");
			let td = document.createElement("td");
			td.innerHTML = i+1;
			alert(i);
			let td1 = document.createElement("td");
			td1.innerHTML = parseInt(stats[i]['correct'])+parseInt(stats[i]['incorrect']);
			let td2 = document.createElement("td");
			td2.innerHTML = stats[i]['correct'];
			let td3 = document.createElement("td");
			td3.innerHTML = stats[i]['incorrect'];
			let td4 = document.createElement("td");
			td4.innerHTML = "OPEN";
			tr.appendChild(td);
			tr.appendChild(td1);
			tr.appendChild(td2);
			tr.appendChild(td3);
			tr.appendChild(td4);
			table.appendChild(tr);
		}
		console.log(table);
		stat.appendChild(table);
		console.log();
        
    }