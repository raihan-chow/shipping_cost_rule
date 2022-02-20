let loadProgressGraph = function (projectPlanDetailsProgressGraph, divId) {
    console.log('loadProgressGraph: projectPlanDetailsProgressGraph=', projectPlanDetailsProgressGraph, divId);
    // Chart code 
    am4core.ready(function () {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        //let chart = am4core.create("progressGraphDiv", am4charts.XYChart);
        let chart = am4core.create(divId, am4charts.XYChart);

        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.paddingRight = 30;
        //chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

        // Add data
        let counter = 0;
        let planDetails = [];
        projectPlanDetailsProgressGraph.forEach(function (value, key) {
            //console.log('PlanDetail=', value.category, ', counter=' + counter);
        	let todaysDate = new Date(value.selectedDate);
        	todaysDate.setDate(todaysDate.getDate()-1);
                
                let milestoneValue = value.milestone;
                if (milestoneValue != null && milestoneValue.length > 40){
                    milestoneValue = milestoneValue.substring(0, 40) + '...';
                } 
            planDetails[counter] = {
                "category": milestoneValue,

                "baselineStartDate": new Date(value.baselineStartDate),
                "baselineEndDate": new Date(value.baselineEndDate),
                "baselineColor": "#17a2b8",

                "revisedStartDate": (value.revisedStartDate != null) ? new Date(value.revisedStartDate):null,
                "revisedEndDate": (value.revisedEndDate != null) ? new Date(value.revisedEndDate): null,
                "revisedColor": "#F9A61D",

                "accomplishedStartDate": (value.accomplishedStartDate != null) ? new Date(value.accomplishedStartDate) : null,
                "accomplishedEndDate": (value.accomplishedEndDate != null) ? new Date(value.accomplishedEndDate) : null,
                "accomplishedColor": "#0DB14B",

                "selectedDate": todaysDate,
                "selectedColor": "#FF0000"
            };
            counter++;
        });
        chart.data = planDetails;

        //console.log('chart data');
        //console.log(chart.data);

        let maxDateRange = new Date(new Date().getFullYear() + 1, 1, 1).getTime();

        chart.dateFormatter.dateFormat = "dd-MMM-yy";
        //chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";

        let categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "category";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.inversed = true;
        categoryAxis.tooltip.disabled = true;
        categoryAxis.renderer.minGridDistance = 10;
        //categoryAxis.parseDates= true;
        //categoryAxis.equalSpacing= true;

        let dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.baseInterval = {count: 1, timeUnit: "day"};
        //dateAxis.max = maxDateRange;
        dateAxis.strictMinMax = true;
        dateAxis.renderer.minGridDistance = 30;
        dateAxis.renderer.tooltipLocation = 0;
        dateAxis.renderer.opposite = true;

        dateAxis.renderer.labels.template.rotation = 270;
        dateAxis.renderer.labels.template.verticalCenter = "middle";
        dateAxis.renderer.labels.template.horizontalCenter = "left";

        //console.log(dateAxis);

        // Create series
        let series1 = chart.series.push(new am4charts.ColumnSeries());
        series1.dataFields.categoryY = "category";
        series1.dataFields.openDateX = "baselineStartDate";
        series1.dataFields.dateX = "baselineEndDate";
        series1.clustered = false;
        series1.columns.template.height = am4core.percent(70);
        series1.columns.template.propertyFields.fill = "baselineColor"; // get color from data
        series1.columns.template.propertyFields.stroke = "baselineColor";
        series1.columns.template.strokeOpacity = 1;
        series1.columns.template.tooltipText = "Baseline date [bold]{baselineStartDate}[/] to [bold]{baselineEndDate}[/]";

        let series2 = chart.series.push(new am4charts.ColumnSeries());
        series2.dataFields.categoryY = "category";
        series2.dataFields.openDateX = "revisedStartDate";
        series2.dataFields.dateX = "revisedEndDate";
        series2.clustered = false;
        series2.columns.template.height = am4core.percent(50);
        series2.columns.template.propertyFields.fill = "revisedColor"; // get color from data
        series2.columns.template.propertyFields.stroke = "revisedColor";
        series2.columns.template.strokeOpacity = 1;
        series2.columns.template.tooltipText = "Revised/Actual Plan [bold]{revisedStartDate}[/] to [bold]{revisedEndDate}[/]";

        let series3 = chart.series.push(new am4charts.ColumnSeries());
        series3.dataFields.categoryY = "category";
        series3.dataFields.openDateX = "accomplishedStartDate";
        series3.dataFields.dateX = "accomplishedEndDate";
        series3.clustered = false;
        series3.columns.template.height = am4core.percent(30);
        series3.columns.template.propertyFields.fill = "accomplishedColor"; // get color from data
        series3.columns.template.propertyFields.stroke = "accomplishedColor";
        series3.columns.template.strokeOpacity = 1;
        series3.columns.template.tooltipText = "Accomplished Plan [bold]{accomplishedStartDate}[/] to [bold]{accomplishedEndDate}[/]";

        //create line
        let lineSeries = chart.series.push(new am4charts.LineSeries());
        lineSeries.dataFields.categoryY = "category";
        lineSeries.dataFields.dateX = "selectedDate";
        lineSeries.strokeWidth = 2;
        lineSeries.propertyFields.stroke = "selectedColor";
        lineSeries.propertyFields.fill = "selectedColor";

//        let bullet = lineSeries.bullets.push(new am4charts.CircleBullet());
//        bullet.tooltipText = "[bold]{selectedDate}";
//        bullet.strokeWidth = 0;
//        bullet.propertyFields.stroke = "selectedColor";
//        bullet.propertyFields.fill = "selectedColor";

        chart.scrollbarX = new am4core.Scrollbar();
        chart.scrollbarX.parent = chart.bottomAxesContainer;
        //chart.scrollbarY = new am4core.Scrollbar();

        chart.responsive.enabled = true;

    }); // end am4core.ready();
};



let loadProgressGraphLine = function (projectPlanDetailsLineProgressGraph, divId) {
    console.log('loadProgressGraph: projectPlanDetailsLineProgressGraph=', projectPlanDetailsLineProgressGraph, divId);
    //<!-- Chart code -->
    am4core.ready(function() {

    	// Themes begin
    	am4core.useTheme(am4themes_animated);
    	// Themes end
        
    	// Create chart
        let chart = am4core.create(divId, am4charts.XYChart);
    	
        chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

        chart.paddingRight = 30;
        
        //chart.minimum = 0;

        let data = [];
        
        projectPlanDetailsLineProgressGraph.sort(function(a, b) {
            return new Date(a.updateDate) - new Date(b.updateDate);
        });
    	
        let counter = 1;
        let prevBaselineValue = 0;
        let prevRevisedValue = 0;
        let prevActualValue = 0;
        
        
        // Revamp: Graph start from 0
        
        if( projectPlanDetailsLineProgressGraph.length > 0 ){
            
            let todaysDate = new Date(projectPlanDetailsLineProgressGraph[0].selectedDate);
            todaysDate.setDate(todaysDate.getDate()-1);
            let updateDate = new Date(projectPlanDetailsLineProgressGraph[0].updateDate);
            updateDate.setDate(updateDate.getDate()-1);
            
            
            data[0] = {
                "updateDate": updateDate,
                "selectedDate": todaysDate,
                "baselineValue": 0,
                "revisedValue": 0,
                "actualValue": 0
            };
        }
        

        
        projectPlanDetailsLineProgressGraph.forEach(function (value, key) {
        	
        	let todaysDate = new Date(value.selectedDate);
        	todaysDate.setDate(todaysDate.getDate()-1);
        	prevBaselineValue += (value.baselineValue!=""&&value.baselineValue!=null)?value.baselineValue:0;
        	prevRevisedValue += (value.revisedValue!=""&&value.revisedValue!=null)?value.revisedValue:0;
        	prevActualValue += (value.actualValue!=""&&value.actualValue!=null)?value.actualValue:0;

            //console.log('grap final actual value');
            //console.log('rev: '+ value.revisedValue +', base: '+ value.baselineValue +', actual: '+  value.actualValue + ', actual value type: ' + typeof value.actualValue);
            
                
                data[counter] = {
                    "updateDate": new Date(value.updateDate),
                    "selectedDate": todaysDate,
                    "baselineValue": (value.baselineValue != "" && value.baselineValue != null) ? prevBaselineValue : null,
                    "revisedValue": (value.revisedValue != "" && value.revisedValue != null) ? prevRevisedValue : null,
                    "actualValue": (value.actualValue !== "" && value.actualValue !== null) ? prevActualValue : null
                };
        	
            
            counter++;
        });


        console.log('grap final data');
        //console.log(data);
        
    	chart.data = data;

    	let dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    	dateAxis.renderer.grid.template.location = 0;
    	dateAxis.renderer.labels.template.fill = am4core.color("#e59165");
    	dateAxis.baseInterval = {
    	  "timeUnit": "day",
    	  "count": 1
    	}
        

    	let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    	valueAxis.tooltip.disabled = true;
    	valueAxis.renderer.labels.template.fill = am4core.color("#e59165");
    	valueAxis.renderer.minWidth = 60;
        
        //valueAxis.min = 0;
        //valueAxis.strictMinMax = true;
        

    	let series = chart.series.push(new am4charts.LineSeries());
    	series.name = "Baseline";
    	series.dataFields.dateX = "updateDate";
    	series.dataFields.valueY = "baselineValue";
    	series.tooltipText = "{valueY.value}";
    	series.fill = am4core.color("#7F7F7F");
    	series.stroke = am4core.color("#7F7F7F");
    	series.strokeWidth = 2;

    	let series2 = chart.series.push(new am4charts.LineSeries());
    	series2.name = "Revised";
    	series2.dataFields.dateX = "updateDate";
    	series2.dataFields.valueY = "revisedValue";
    	series2.yAxis = valueAxis;
    	series2.xAxis = dateAxis;
    	series2.tooltipText = "{valueY.value}";
    	series2.fill = am4core.color("#0070C0");
    	series2.stroke = am4core.color("#0070C0");
    	series2.strokeWidth = 2;

    	let series3 = chart.series.push(new am4charts.LineSeries());
    	series3.name = "Actual";
    	series3.dataFields.dateX = "updateDate";
    	series3.dataFields.valueY = "actualValue";
    	series3.yAxis = valueAxis;
    	series3.xAxis = dateAxis;
    	series3.tooltipText = "{valueY.value}";
    	series3.fill = am4core.color("#00B050");
    	series3.stroke = am4core.color("#00B050");
    	series3.strokeWidth = 2;

    	let series4 = chart.series.push(new am4charts.LineSeries());
    	series4.name = "";
    	series4.dataFields.dateX = "selectedDate";
    	series4.dataFields.valueY = "baselineValue";
    	series4.yAxis = valueAxis;
    	series4.xAxis = dateAxis;
    	series4.fill = am4core.color("#FF0000");
    	series4.stroke = am4core.color("#FF0000");
    	series4.strokeWidth = 2;



    	let bullet2 = series2.bullets.push(new am4charts.CircleBullet());
    	series2.heatRules.push({
    	  target: bullet2.circle,
    	  min: 5,
    	  max: 5,
    	  property: "radius"
    	});

    	let bullet3 = series3.bullets.push(new am4charts.CircleBullet());
    	series3.heatRules.push({
    	  target: bullet3.circle,
    	  min: 5,
    	  max: 5,
    	  property: "radius"
    	});

    	let bullet = series.bullets.push(new am4charts.CircleBullet());
    	series.heatRules.push({
    	  target: bullet2.circle,
    	  min: 5,
    	  max: 5,
    	  property: "radius"
    	});
    			
    	chart.cursor = new am4charts.XYCursor();
    	chart.cursor.xAxis = dateAxis;

    	chart.scrollbarX = new am4core.Scrollbar();
    	chart.scrollbarX.parent = chart.bottomAxesContainer;

    	chart.legend = new am4charts.Legend();
    	chart.legend.parent =  chart.topAxesContainer;
    	chart.legend.zIndex = 100;

    	dateAxis.renderer.grid.template.strokeOpacity = 0.07;
    	valueAxis.renderer.grid.template.strokeOpacity = 0.07;
    	
    	chart.responsive.enabled = true;
    	console.log('loadProgressGraph: projectPlanDetailsLineProgressGraph end=', projectPlanDetailsLineProgressGraph, divId);
    	}); // end am4core.ready()
};