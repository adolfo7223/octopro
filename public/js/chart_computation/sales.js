$(document).ready(function() {
    const API_KEY = 'AIzaSyBzOvEQGONKm2a3VoC9g6zN4gFh0cfp9Sk';
    const SALES_SPREADSHEET_ID = '1oP4l5wwf9KqRUOQYa273OkKsy17RwSe6TwxgtV-S3HA';

    //Date Filter
    $("#sales_from_left").change(function() {

        $("#sales_chart_left").remove();

        $("#sales_chart_left_container").append(`<canvas id="sales_chart_left" width="400" height="400"></canvas>`);

        gapi.load('client', function() {
            initClient('left');
        });
    })

    $("#sales_to_left").change(function() {

        $("#sales_chart_left").remove();

        $("#sales_chart_left_container").append(`<canvas id="sales_chart_left" width="400" height="400"></canvas>`);

        gapi.load('client', function() {
            initClient('left');
        });
    })

    $("#sales_from_right").change(function() {

        $("#sales_chart_right").remove();

        $("#sales_chart_right_container").html(`<canvas id="sales_chart_right" width="400" height="400"></canvas>`);

        gapi.load('client', function() {
            initClient('right');
        });
    })

    $("#sales_to_right").change(function() {

        $("#sales_chart_right").remove();

        $("#sales_chart_right_container").html(`<canvas id="sales_chart_right" width="400" height="400"></canvas>`);

        gapi.load('client', function() {
            initClient('right');
        });
    })

    // Load the Google Sheets API
    gapi.load('client', initClient);

    function initClient(side) {
        gapi.client.init({
        apiKey: API_KEY,
        discoveryDocs: ['https://sheets.googleapis.com/$discovery/rest?version=v4'],
        }).then(function () {
        // After the API is loaded, you can use it to fetch data
        sales_sheet_data(side);
        });
    }

    function sales_sheet_data(side) {
        gapi.client.sheets.spreadsheets.values.get({
        spreadsheetId: SALES_SPREADSHEET_ID,
        range: `'LEADS'!A2:AD`, // Change this to the specific sheet and range you want to fetch
        }).then(function (response) {
        const values = response.result.values;
        sales_charts(values, side);
        // console.log('Google Sheet Values:', values);
        }, function (error) {
        console.error('Error fetching Google Sheet data:', error);
        });
    }

    function sales_charts(values, side) {
        
        if (side == "left") {
            create_charts_sales_left(values);
        } else if (side == "right") {
            create_charts_sales(values);
        } else {
            create_charts_sales_default(values);
        }
    }

    function create_charts_sales_default(records) {

        var number_of_leads = 0;
        var number_of_appointment_set = 0;
        var number_of_sales = 0;

        $.each(records, function(key, value) {
            
            number_of_leads += 1;

            if (value[2]) {
                if (value[2] == "Estimate Booked") {
                    number_of_appointment_set += 1;
                } else if (value[2] == "Job Booked") { //Job Booked old Status
                    number_of_sales += 1;
                }
            }

        })

        var sales_left = document.getElementById('sales_chart_left').getContext('2d');
        var sales_right = document.getElementById('sales_chart_right').getContext('2d');

        // Define the data for the chart
        var data_left = {
            labels: ["Number of Leads", "Number of Appointment Set", "Number of Sales"],
            datasets: [{
                label: 'Sales',
                data: [number_of_leads, number_of_appointment_set, number_of_sales], // Replace with your data values
            }]
        };

        // Define the options for the chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
        };

        // Create the doughnut chart
        var myDoughnutChart_left = new Chart(sales_left, {
            type: 'line',
            data: data_left,
            options: options
        });

        var data_right = {
            labels: ["Number of Leads", "Number of Appointment Set", "Number of Sales"],
            datasets: [{
                label: 'Sales',
                data: [number_of_leads, number_of_appointment_set, number_of_sales], // Replace with your data values
            }]
        };

        // Define the options for the chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
        };

        // Create the doughnut chart
        var myDoughnutChart_right = new Chart(sales_right, {
            type: 'line',
            data: data_right,
            options: options
        });
    }

    function create_charts_sales_left(records) {
        var sales_from_left = Math.floor(new Date($("#sales_from_left").val()).getTime() / 1000);
        var sales_to_left = Math.floor(new Date($("#sales_to_left").val()).getTime() / 1000)

        var number_of_leads_left = 0;
        var number_of_appointment_set_left = 0;
        var number_of_sales_left = 0;

        $.each(records, function(key, value) {
            var record_date = Math.floor(new Date(value[0]).getTime() / 1000);

            if (sales_from_left <= record_date && sales_to_left >= record_date) {
                number_of_leads_left += 1;

                if (value[2]) {
                    if (value[2] == "Estimate Booked") {
                        number_of_appointment_set_left += 1;
                    } else if (value[2] == "Job Booked") {
                        number_of_sales_left += 1;
                    }
                }
            }
        })

        var sales_left = document.getElementById('sales_chart_left').getContext('2d');

        // Define the data for the chart
        var data_left = {
            labels: ["Number of Leads", "Number of Appointment Set", "Number of Sales"],
            datasets: [{
                label: 'Sales',
                data: [number_of_leads_left, number_of_appointment_set_left, number_of_sales_left], // Replace with your data values
            }]
        };

        // Define the options for the chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
        };

        // Create the doughnut chart
        var myDoughnutChart_left = new Chart(sales_left, {
            type: 'line',
            data: data_left,
            options: options
        });

    }

    function create_charts_sales(records) {
        var sales_from_left = Math.floor(new Date($("#sales_from_left").val()).getTime() / 1000);
        var sales_to_left = Math.floor(new Date($("#sales_to_left").val()).getTime() / 1000)

        var sales_from_right = Math.floor(new Date($("#sales_from_right").val()).getTime() / 1000);
        var sales_to_right = Math.floor(new Date($("#sales_to_right").val()).getTime() / 1000)

        // const leadSource = {};

        ///Sales Record for Left Card
        // var number_of_leads_left = 0;
        // var number_of_appointment_set_left = 0;
        // var number_of_sales_left = 0;

        var number_of_leads_right = 0;
        var number_of_appointment_set_right = 0;
        var number_of_sales_right = 0;
        $.each(records, function(key, value) {
            var record_date = Math.floor(new Date(value[0]).getTime() / 1000);

            // console.log(record_date)

            // if (sales_from_left <= record_date && sales_to_left >= record_date) {
            //     number_of_leads_left += 1;

            //     if (value[2]) {
            //         if (value[2] == "Estimate Booked") {
            //             number_of_appointment_set_left += 1;
            //         } else if (value[2] == "Job Booked") {
            //             number_of_sales_left += 1;
            //         }
            //     }
            // }

            if (sales_from_right <= record_date && sales_to_right >= record_date) {
                number_of_leads_right += 1;

                if (value[2]) {
                    if (value[2] == "Estimate Booked") {
                        number_of_appointment_set_right += 1;
                    } else if (value[2] == "Job Booked") {
                        number_of_sales_right += 1;
                    }
                }
            }
        })

        var sales_left = document.getElementById('sales_chart_left').getContext('2d');
        var sales_right = document.getElementById('sales_chart_right').getContext('2d');

        ///////////////////////// SALES LEFT

        // Define the data for the chart
        // var data_left = {
        //     labels: ["Number of Leads", "Number of Appointment Set", "Number of Sales"],
        //     datasets: [{
        //         label: 'Sales',
        //         data: [number_of_leads_left, number_of_appointment_set_left, number_of_sales_left], // Replace with your data values
        //     }]
        // };

        // Define the options for the chart
        // var options = {
        //     responsive: true,
        //     maintainAspectRatio: false,
        //     cutoutPercentage: 50, // Adjust the size of the hole (0-100)
        // };

        // Create the doughnut chart
        // var myDoughnutChart_left = new Chart(sales_left, {
        //     type: 'line',
        //     data: data_left,
        //     options: options
        // });

        ///////////////////////// SALES RIGHT

        var data_right = {
            labels: ["Number of Leads", "Number of Appointment Set", "Number of Sales"],
            datasets: [{
                label: 'Sales',
                data: [number_of_leads_right, number_of_appointment_set_right, number_of_sales_right], // Replace with your data values
            }]
        };

        // Define the options for the chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
        };

        // Create the doughnut chart
        var myDoughnutChart_right = new Chart(sales_right, {
            type: 'line',
            data: data_right,
            options: options
        });
    }

})