$(document).ready(function() {
    const API_KEY = 'AIzaSyBYT0n_vVzZ-oxpwGzpnErgaf7pCWTf1Og';
    const OPERATION_SPREADSHEET_ID = '1VpWS5RmJZBRdBqVRUPwySGLetVPO3iqVYR8JVg5aYUo';

    $("#sales_from_left").change(function() {

        $("#revenue_per_service_left").remove();
        $("#revenue_per_truck_left").remove();

        $("#operation_revenue_chart_left_container").append(`<canvas id="revenue_per_service_left" width="400" height="600"></canvas>`);
        $("#operation_revenue_truck_chart_left_container").append(`<canvas id="revenue_per_truck_left" width="400" height="600"></canvas>`);

        gapi.load('client', function() {
            initClientOperation('left');
        });
    })

    $("#sales_to_left").change(function() {

        $("#revenue_per_service_left").remove();
        $("#revenue_per_truck_left").remove();

        $("#operation_revenue_chart_left_container").append(`<canvas id="revenue_per_service_left" width="400" height="600"></canvas>`);
        $("#operation_revenue_truck_chart_left_container").append(`<canvas id="revenue_per_truck_left" width="400" height="600"></canvas>`);

        gapi.load('client', function() {
            initClientOperation('left');
        });
    })

    $("#sales_from_right").change(function() {

        $("#revenue_per_service_right").remove();
        $("#revenue_per_truck_right").remove();

        $("#operation_revenue_chart_right_container").html(`<canvas id="revenue_per_service_right" width="400" height="600"></canvas>`);
        $("#operation_revenue_truck_chart_right_container").append(`<canvas id="revenue_per_truck_right" width="400" height="600"></canvas>`);

        gapi.load('client', function() {
            initClientOperation('right');
        });
    })

    $("#sales_to_right").change(function() {

        $("#revenue_per_service_right").remove();
        $("#revenue_per_truck_right").remove();

        $("#operation_revenue_chart_right_container").html(`<canvas id="revenue_per_service_right" width="400" height="600"></canvas>`);
        $("#operation_revenue_truck_chart_right_container").append(`<canvas id="revenue_per_truck_right" width="400" height="600"></canvas>`);

        gapi.load('client', function() {
            initClientOperation('right');
        });
    })

    gapi.load('client', initClientOperation);

    function initClientOperation(side) {
        gapi.client.init({
            apiKey: 'AIzaSyBYT0n_vVzZ-oxpwGzpnErgaf7pCWTf1Og',
            discoveryDocs: ['https://sheets.googleapis.com/$discovery/rest?version=v4'],
        }).then(function () {
            // After the API is loaded, you can use it to fetch data
            fetchGoogleSheetDataOperation(side);
            fetchGoogleSheetDataLaborPercentage()
        });
    }

    function fetchGoogleSheetDataOperation(side) {
        gapi.client.sheets.spreadsheets.values.get({
            spreadsheetId: OPERATION_SPREADSHEET_ID,
            range: `'Transaction List'!A2:L`, // Change this to the specific sheet and range you want to fetch
        }).then(function (response) {
            const values = response.result.values;

            if (side == "left") {
                create_charts_service_revenue_left(values);
                create_charts_truck_revenue_left(values);
            } else if (side == "right") {
                create_charts_service_revenue_right(values);
                create_charts_truck_revenue_right(values);
            } else {
                create_charts_service_revenue_default(values);
                create_charts_truck_revenue_default(values);
            }

            // create_charts_truck_revenue(values);
        }, function (error) {
            console.error('Error fetching Google Sheet data:', error);
        });
    }

    function fetchGoogleSheetDataLaborPercentage() {
        gapi.client.sheets.spreadsheets.values.get({
            spreadsheetId: OPERATION_SPREADSHEET_ID,
            range: `'Payroll Summary'!A2:G`, // Change this to the specific sheet and range you want to fetch
        }).then(function (response) {
            const values = response.result.values;

            create_charts_labor_percentage(values);

            // create_charts_truck_revenue(values);
        }, function (error) {
            console.error('Error fetching Google Sheet data:', error);
        });
    }

    function create_charts_labor_percentage(records) {
        console.log(records)

        var netpay = 0;
        var employee_taxes = 0;
        var employer_taxes = 0;
        $.each(records, function(key, value) {
            if (value[4]) { //Total netpay Computation
                var netpay_split = value[4].split('$');
                var netpay_split_to_number = parseFloat(netpay_split.toString().replace(/,/g, ''));

                if (Number.isFinite(netpay_split_to_number)) {
                    netpay += netpay_split_to_number;
                } else {
                    netpay += 0;
                }
            } else {
                netpay += 0;
            }

            if (value[5]) { //Total netpay Computation
                var employee_split = value[5].split('$');
                var employee_split_to_number = parseFloat(employee_split.toString().replace(/,/g, ''));

                if (Number.isFinite(employee_split_to_number)) {
                    employee_taxes += employee_split_to_number;
                } else {
                    employee_taxes += 0;
                }
            } else {
                employee_taxes += 0;
            }

            if (value[6]) { //Total netpay Computation
                var employer_split = value[6].split('$');
                var employer_split_to_number = parseFloat(employer_split.toString().replace(/,/g, ''));

                if (Number.isFinite(employer_split_to_number)) {
                    employer_taxes += employer_split_to_number;
                } else {
                    employer_taxes += 0;
                }
            } else {
                employer_taxes += 0;
            }

        })

        var total_payroll = netpay + employee_taxes + employer_taxes;
        var total_service_revenue = sessionStorage.getItem('total_revenue')

        var labor_percentage = (total_payroll / total_service_revenue) * 100;

        console.log('labor percentage: '+labor_percentage)

        $("#total_labor_percentage").html(' $'+labor_percentage.toLocaleString('en-US')+'.00');

        sessionStorage.setItem('total_payroll', total_payroll);

        console.log('netpay: '+netpay)
        console.log('employee taxes: '+employee_taxes)
        console.log('employer taxes: '+employer_taxes)
        console.log('total payroll: '+total_payroll)
        
    }

    function create_charts_service_revenue_default(records) {
        var new_records = [];
        var total_service_revenue = 0;
        $.each(records, function(key, value) {

            if (value[11]) {
                var total_service_revenue_split = value[11].split('$');
                var convert_service_revenue_split_to_number = parseFloat(total_service_revenue_split.toString().replace(/,/g, ''));
                if (Number.isFinite(convert_service_revenue_split_to_number)) {
                    total_service_revenue += convert_service_revenue_split_to_number
                } else {
                    total_service_revenue += 0;
                }
            } else {
                total_service_revenue += 0;
            }

            new_records[key] = value[7];

        })

        sessionStorage.setItem('total_revenue', total_service_revenue)
        var total_payroll = sessionStorage.getItem('total_payroll')

        var labor_percentage = (total_payroll / total_service_revenue) * 100;

        console.log('labor percentage: '+labor_percentage)

        $("#total_labor_percentage").html(labor_percentage.toFixed(2)+'%');
        $("#total_revenue").html(' $'+total_service_revenue.toLocaleString('en-US')+'.00');

        new_records = [...new Set(records.map(x => x[7]?x[7]:'unknown'))];

        var service_revenue = [];
        $.each(new_records, function(key, value) {
            var revenue = 0;
            $.each(records, function(records_key, records_value) {
                
                if (value == records_value[7]) {
                    // console.log(records_value[10])
                    if (records_value[11]) {
                        var record_value_amount = records_value[11];
                        record_value_amount = record_value_amount.split('$')
                        var record_value_amount_converted = parseFloat(record_value_amount.toString().replace(/,/g, ''));

                        if (Number.isFinite(record_value_amount_converted)) {
                            record_value_amount_converted = record_value_amount_converted;
                        } else {
                            record_value_amount_converted = 0;
                        }

                    } else {
                        var record_value_amount = 0;
                        var record_value_amount_converted = record_value_amount;
                    }
                    revenue += record_value_amount_converted;
                }
            })

            service_revenue[key] = (revenue / total_service_revenue) * 100;
        })

        var ctx_left = document.getElementById('revenue_per_service_left').getContext('2d');
        var ctx_right = document.getElementById('revenue_per_service_right').getContext('2d');

        // // Define the data for the chart
        var data = {
            labels: new_records,
            datasets: [{
                data: service_revenue, // Replace with your data values
            }]
        };

        // // Define the options for the chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
            legend: {
                display: false,  // Hide the default legend
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center',
                    labels: {
                        boxWidth: 15,
                        padding: 15
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            var label = context.label || '';

                            if (label) {
                                label += ': ';
                            }

                            label += parseFloat(context.formattedValue).toFixed(2) + '%';

                            return label;
                        }
                    }
                }
            }
        };

        // // Create the doughnut chart
        var myDoughnutChartLeft = new Chart(ctx_left, {
            type: 'doughnut',
            data: data,
            options: options
        });

        var myDoughnutChartRight = new Chart(ctx_right, {
            type: 'doughnut',
            data: data,
            options: options
        });
    }

    function create_charts_service_revenue_left(records) {
        var sales_from_left = Math.floor(new Date($("#sales_from_left").val()).getTime() / 1000);
        var sales_to_left = Math.floor(new Date($("#sales_to_left").val()).getTime() / 1000)

        var new_records = [];
        var total_service_revenue = 0;
        $.each(records, function(key, value) {
            var record_date = Math.floor(new Date(value[0]).getTime() / 1000);

            if (sales_from_left <= record_date && sales_to_left >= record_date) {
                if (value[11]) {
                    var total_service_revenue_split = value[11].split('$');
                    total_service_revenue += parseFloat(total_service_revenue_split.toString().replace(/,/g, ''))
                } else {
                    total_service_revenue += 0;
                }

                new_records[key] = value[7];
            }

        })

        new_records = [...new Set(records.map(x => x[7]?x[7]:'unknown'))];

        var service_revenue = [];
        $.each(new_records, function(key, value) {
            var revenue = 0;
            $.each(records, function(records_key, records_value) {
                var record_date = Math.floor(new Date(records_value[0]).getTime() / 1000);
                
                if (sales_from_left <= record_date && sales_to_left >= record_date) {
                    if (value == records_value[7]) {
                        // console.log(records_value[10])
                        if (records_value[11]) {
                        var record_value_amount = records_value[11];
                        record_value_amount = record_value_amount.split('$')
                        var record_value_amount_converted = parseFloat(record_value_amount.toString().replace(/,/g, ''));

                        if (Number.isFinite(record_value_amount_converted)) {
                            record_value_amount_converted = record_value_amount_converted;
                        } else {
                            record_value_amount_converted = 0;
                        }

                        } else {
                        var record_value_amount = 0;
                        var record_value_amount_converted = record_value_amount;
                        }
                        revenue += record_value_amount_converted;
                    }
                }
            })

            service_revenue[key] = (revenue / total_service_revenue) * 100;
        })

        var ctx = document.getElementById('revenue_per_service_left').getContext('2d');

        // // Define the data for the chart
        var data = {
            labels: new_records,
            datasets: [{
                data: service_revenue, // Replace with your data values
            }]
        };

        // // Define the options for the chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
            legend: {
                display: false,  // Hide the default legend
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center',
                    labels: {
                        boxWidth: 15,
                        padding: 15
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            var label = context.label || '';

                            if (label) {
                                label += ': ';
                            }

                            label += parseFloat(context.formattedValue).toFixed(2) + '%';

                            return label;
                        }
                    }
                }
            }
        };

        // // Create the doughnut chart
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });
    }

    function create_charts_service_revenue_right(records) {
        var sales_from_right = Math.floor(new Date($("#sales_from_right").val()).getTime() / 1000);
        var sales_to_right = Math.floor(new Date($("#sales_to_right").val()).getTime() / 1000)

        var new_records = [];
        var total_service_revenue = 0;
        $.each(records, function(key, value) {
            var record_date = Math.floor(new Date(value[0]).getTime() / 1000);
                
            if (sales_from_right <= record_date && sales_to_right >= record_date) {
                if (value[11]) {
                    var total_service_revenue_split = value[11].split('$');
                    total_service_revenue += parseFloat(total_service_revenue_split.toString().replace(/,/g, ''))
                } else {
                    total_service_revenue += 0;
                }

                new_records[key] = value[7];
            }
        })

        new_records = [...new Set(records.map(x => x[7]?x[7]:'unknown'))];

        var service_revenue = [];
        $.each(new_records, function(key, value) {
            var revenue = 0;
            $.each(records, function(records_key, records_value) {
                var record_date = Math.floor(new Date(records_value[0]).getTime() / 1000);
                
                if (sales_from_right <= record_date && sales_to_right >= record_date) {
                    if (value == records_value[7]) {
                        // console.log(records_value[10])
                        if (records_value[11]) {
                        var record_value_amount = records_value[11];
                        record_value_amount = record_value_amount.split('$')
                        var record_value_amount_converted = parseFloat(record_value_amount.toString().replace(/,/g, ''));

                        if (Number.isFinite(record_value_amount_converted)) {
                            record_value_amount_converted = record_value_amount_converted;
                        } else {
                            record_value_amount_converted = 0;
                        }

                        } else {
                        var record_value_amount = 0;
                        var record_value_amount_converted = record_value_amount;
                        }
                        revenue += record_value_amount_converted;
                    }
                }
            })
            service_revenue[key] = (revenue / total_service_revenue) * 100;
        })

        var ctx = document.getElementById('revenue_per_service_right').getContext('2d');

        // // Define the data for the chart
        var data = {
            labels: new_records,
            datasets: [{
                data: service_revenue, // Replace with your data values
            }]
        };

        // // Define the options for the chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
            legend: {
                display: false,  // Hide the default legend
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center',
                    labels: {
                        boxWidth: 15,
                        padding: 15
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            var label = context.label || '';

                            if (label) {
                                label += ': ';
                            }

                            label += parseFloat(context.formattedValue).toFixed(2) + '%';

                            return label;
                        }
                    }
                }
            }
        };

        // // Create the doughnut chart
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: data,
            options: options
        });
    }

    function create_charts_truck_revenue_left(records) {
        var sales_from_left = Math.floor(new Date($("#sales_from_left").val()).getTime() / 1000);
        var sales_to_left = Math.floor(new Date($("#sales_to_left").val()).getTime() / 1000)

        var new_records = [];
        $.each(records, function(key, value) {

            new_records[key] = value[7];

        })

        new_records = [...new Set(records.map(x => x[3]?x[3]:'unknown'))];

        var service_revenue = [];
        $.each(new_records, function(key, value) {
            var revenue = 0;
            $.each(records, function(records_key, records_value) {
                var record_date = Math.floor(new Date(records_value[0]).getTime() / 1000);

                if (sales_from_left <= record_date && sales_to_left >= record_date) {
                    if (value == records_value[3]) {
                        // console.log(records_value[10])
                        if (records_value[11]) {
                        var record_value_amount = records_value[11];
                        record_value_amount = record_value_amount.split('$')
                        var record_value_amount_converted = parseFloat(record_value_amount.toString().replace(/,/g, ''));

                        if (Number.isFinite(record_value_amount_converted)) {
                            record_value_amount_converted = record_value_amount_converted;
                        } else {
                            record_value_amount_converted = 0;
                        }

                        } else {
                        var record_value_amount = 0;
                        var record_value_amount_converted = record_value_amount;
                        }
                        revenue += record_value_amount_converted;
                    }
                }
            })
            service_revenue[key] = revenue;
        })

        var ctx = document.getElementById('revenue_per_truck_left').getContext('2d');

        // // Define the data for the chart
        var data = {
            labels: new_records,
            datasets: [{
                label: 'Revenue Per Truck',
                data: service_revenue, // Replace with your data values
                backgroundColor: "rgba(0, 156, 173)"
            }]
        };

        // // Define the options for the chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value, index, values) {
                            return '$ ' + parseFloat(value).toFixed(2); // Append '$' to the tick value
                        }
                    }
                }
            },
            legend: {
                display: false,  // Hide the default legend
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center',
                    labels: {
                        boxWidth: 15,
                        padding: 15
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            var label = context.dataset.label || '';

                            if (label) {
                                label += ': ';
                            }

                            label += '$' + context.formattedValue;

                            return label;
                        }
                    }
                }
            }
        };

        // // Create the doughnut chart
        var myDoughnutChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    }

    function create_charts_truck_revenue_right(records) {
        var sales_from_right = Math.floor(new Date($("#sales_from_right").val()).getTime() / 1000);
        var sales_to_right = Math.floor(new Date($("#sales_to_right").val()).getTime() / 1000)

        var new_records = [];
        $.each(records, function(key, value) {

            new_records[key] = value[7];

        })

        new_records = [...new Set(records.map(x => x[3]?x[3]:'unknown'))];

        var service_revenue = [];
        $.each(new_records, function(key, value) {
            var revenue = 0;
            $.each(records, function(records_key, records_value) {
                var record_date = Math.floor(new Date(records_value[0]).getTime() / 1000);

                if (sales_from_right <= record_date && sales_to_right >= record_date) {
                    if (value == records_value[3]) {
                        // console.log(records_value[10])
                        if (records_value[11]) {
                        var record_value_amount = records_value[11];
                        record_value_amount = record_value_amount.split('$')
                        var record_value_amount_converted = parseFloat(record_value_amount.toString().replace(/,/g, ''));

                        if (Number.isFinite(record_value_amount_converted)) {
                            record_value_amount_converted = record_value_amount_converted;
                        } else {
                            record_value_amount_converted = 0;
                        }

                        } else {
                        var record_value_amount = 0;
                        var record_value_amount_converted = record_value_amount;
                        }
                        revenue += record_value_amount_converted;
                    }
                }
            })
            service_revenue[key] = revenue;
        })

        var ctx = document.getElementById('revenue_per_truck_right').getContext('2d');

        // // Define the data for the chart
        var data = {
            labels: new_records,
            datasets: [{
                label: 'Revenue Per Truck',
                data: service_revenue, // Replace with your data values
                backgroundColor: "rgba(0, 156, 173)"
            }]
        };

        // // Define the options for the chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value, index, values) {
                            return '$ ' + parseFloat(value).toFixed(2); // Append '$' to the tick value
                        }
                    }
                }
            },
            legend: {
                display: false,  // Hide the default legend
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center',
                    labels: {
                        boxWidth: 15,
                        padding: 15
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            var label = context.dataset.label || '';

                            if (label) {
                                label += ': ';
                            }

                            label += '$' + context.formattedValue;

                            return label;
                        }
                    }
                }
            }
        };

        // // Create the doughnut chart
        var myDoughnutChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    }

    function create_charts_truck_revenue_default(records) {

        var new_records = [];
        $.each(records, function(key, value) {

            new_records[key] = value[7];

        })

        new_records = [...new Set(records.map(x => x[3]?x[3]:'unknown'))];

        var service_revenue = [];
        $.each(new_records, function(key, value) {
            var revenue = 0;
            $.each(records, function(records_key, records_value) {

                if (value == records_value[3]) {
                    // console.log(records_value[10])
                    if (records_value[11]) {
                    var record_value_amount = records_value[11];
                    record_value_amount = record_value_amount.split('$')
                    var record_value_amount_converted = parseFloat(record_value_amount.toString().replace(/,/g, ''));

                    if (Number.isFinite(record_value_amount_converted)) {
                        record_value_amount_converted = record_value_amount_converted;
                    } else {
                        record_value_amount_converted = 0;
                    }

                    } else {
                    var record_value_amount = 0;
                    var record_value_amount_converted = record_value_amount;
                    }
                    revenue += record_value_amount_converted;
                }
            })
            service_revenue[key] = revenue;
        })

        var ctx_left = document.getElementById('revenue_per_truck_left').getContext('2d');
        var ctx_right = document.getElementById('revenue_per_truck_right').getContext('2d');

        // // Define the data for the chart
        var data = {
            labels: new_records,
            datasets: [{
                label: 'Revenue Per Truck',
                data: service_revenue, // Replace with your data values
                backgroundColor: "rgba(0, 156, 173)"
            }]
        };

        // // Define the options for the chart
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value, index, values) {
                            return '$ ' + parseFloat(value).toFixed(2); // Append '$' to the tick value
                        }
                    }
                }
            },
            legend: {
                display: false,  // Hide the default legend
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    align: 'center',
                    labels: {
                        boxWidth: 15,
                        padding: 15
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            var label = context.dataset.label || '';

                            if (label) {
                                label += ': ';
                            }

                            label += '$' + context.formattedValue;

                            return label;
                        }
                    }
                }
            }
        };

        // // Create the doughnut chart
        var myDoughnutChartLeft = new Chart(ctx_left, {
            type: 'bar',
            data: data,
            options: options
        });

        var myDoughnutChartRight = new Chart(ctx_right, {
            type: 'bar',
            data: data,
            options: options
        });
    }

})
