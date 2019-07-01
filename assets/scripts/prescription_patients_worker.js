// web_worker.js

onMessage = e => {

    
    let xhttp = new XMLHttpRequest();
    
        
    let url = e.data;
    
        
    xhttp.onreadystatechange = function () {
    
           
    if (this.readyState == 4 && this.status == 200){
                
        var alarm_data =  json_encode($alarm_data);
        postMessage(alarm_data);
            }
        
    };
    
        
    
    xhttp.open("GET", "../php/prescription_data.php", true);
    xhttp.send();
    
        
    }