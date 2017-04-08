// Global Chart Configuration	
Chart.defaults.global = {
	type: 'line',
	data: {
	        datasets: [{
	            label: 'QuTiP 3.1.0',
	            fill: false,
	            borderWidth: 3.0,
	            borderColor: '#3366cc',
	            backgroundColor: '#3366cc'
	        }, {
		       label: 'QuantumOptics.jl',
		       fill: false,
		       borderWidth: 3.0,
		       borderColor: '#ff6600',
		       backgroundColor: '#ff6600'
	        }]
	    },
	    options: {
		    title: {
			    display: true,
			    title: 'Test'
				},
	        scales: {
	            xAxes: [{
		            type: 'linear',
		            position: 'bottom',
	                scaleLabel: {
		                display: true,
		                labelString: 'Hilbert-Space Dimension'
	                }      
	            }],
	            yAxes: [{
	                scaleLabel: {
		                display: true,
		                labelString: 'Ellapsed Time'
	                }
	                
	            }]
	        }
	    }
}


$.getJSON('js/plots/coherentstate.json', function (data) {
	
	data1 = [];
	var jsondata = data.QuTiP_3_1_0;
	
	for (var i in jsondata) {
		xval = jsondata[i].N;
		yval = jsondata[i].t;
		data1.push({x: xval, y: yval});
	}

	
	data2 = [];
	var jsondata = data.QuantumOptics_jl_f37e22f2e7;
	
	for (var i in jsondata) {
		xval = jsondata[i].N;
		yval = jsondata[i].t;
		data2.push({x: xval, y: yval});
	}


	var ctx = $('#plot-coherentstate');

	var scatterChart = new Chart(ctx, {
	    type: 'line',
	    data: {
	        datasets: [{
	            label: 'QuTiP 3.1.0',
	            data: data1,
	            fill: false,
	            borderWidth: 3.0,
	            borderColor: '#3366cc',
	            backgroundColor: '#3366cc'
	        }, {
		       label: 'QuantumOptics.jl',
		       data: data2,
		       fill: false,
		       borderWidth: 3.0,
		       borderColor: '#ff6600',
		       backgroundColor: '#ff6600'
	        }]
	    },
	    options: {
		    title: {
			    display: true,
				text: 'Coherent State Performacne'
				},
	        scales: {
	            xAxes: [{
		            type: 'linear',
		            position: 'bottom',
	                scaleLabel: {
		                display: true,
		                labelString: 'Hilbert-Space Dimension'
	                }      
	            }],
	            yAxes: [{
	                scaleLabel: {
		                display: true,
		                labelString: 'Ellapsed Time'
	                }
	                
	            }]
	        }
	    }
	});
	});