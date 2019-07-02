if (window.Worker) {

    if (typeof(web_worker) == "undefined") {
        if (w==null){
            web_worker = new WebWorker("prescription_patients_worker.js");
         }
        //let url = "prescription_patients_worker.js"; 

        // Path of the web worker
        //let web_worker = new WebWorker(url);


        web_worker.onMessage = e => {

            // Receive data from the web worker
            for (var i = 0; i < alarm_data.length; i++) { 
                display(alarm_data[i]);
            }
        }


        // post message to the web worker. 
        web_worker.postMessage(url);
    }
  
}





