$(document).ready(function() {
    const TECH_PRODUCTIVITY_SPREADSHEET_ID = '1VpWS5RmJZBRdBqVRUPwySGLetVPO3iqVYR8JVg5aYUo';

    $("#sales_from_left").change(function() {

        $("#tech_productivity_left").remove();

        $("#tech_productivity_left_container").append(`<canvas id="tech_productivity_left" width="400" height="600"></canvas>`);

        gapi.load('client', function() {
            initTechProductivity('left');
        });
    })

    $("#sales_to_left").change(function() {

        $("#tech_productivity_left").remove();

        $("#tech_productivity_left_container").append(`<canvas id="tech_productivity_left" width="400" height="600"></canvas>`);

        gapi.load('client', function() {
            initTechProductivity('left');
        });
    })

    $("#sales_from_right").change(function() {

        $("#tech_productivity_right").remove();

        $("#tech_productivity_right_container").append(`<canvas id="tech_productivity_right" width="400" height="600"></canvas>`);

        gapi.load('client', function() {
            initTechProductivity('right');
        });
    })

    $("#sales_to_right").change(function() {

        $("#tech_productivity_right").remove();

        $("#tech_productivity_right_container").append(`<canvas id="tech_productivity_right" width="400" height="600"></canvas>`);

        gapi.load('client', function() {
            initTechProductivity('right');
        });
    })

    // Load the Google Sheets API
    gapi.load('client', initTechProductivity);

    function initTechProductivity(side) {
        gapi.client.init({
            apiKey: 'AIzaSyBzOvEQGONKm2a3VoC9g6zN4gFh0cfp9Sk',
            discoveryDocs: ['https://sheets.googleapis.com/$discovery/rest?version=v4'],
        }).then(function () {
            // After the API is loaded, you can use it to fetch data
            fetchGoogleSheetDataTechProductivity(side);
        });
    }

    function fetchGoogleSheetDataTechProductivity(side) {
        gapi.client.sheets.spreadsheets.values.get({
          spreadsheetId: TECH_PRODUCTIVITY_SPREADSHEET_ID,
          range: `'Tech Hours'!A679:S`, // Change this to the specific sheet and range you want to fetch
        }).then(function (response) {
          const values = response.result.values;

            if (side == "left") {
                create_charts_tech_productivity_left(values);
            } else if (side == "right") {
                create_charts_tech_productivity_right(values);
            } else {
                create_charts_tech_productivity_default(values);
            }

        }, function (error) {
          console.error('Error fetching Google Sheet data:', error);
        });
    }

    function create_charts_tech_productivity_left(records) {
        var sales_from_left = Math.floor(new Date($("#sales_from_left").val()).getTime() / 1000);
        var sales_to_left = Math.floor(new Date($("#sales_to_left").val()).getTime() / 1000)

        new_records = [...new Set(records.map(x => x[2]?x[2]:'unknown'))];

        var service_revenue = [];
        $.each(new_records, function(key, value) {
            var revenue = 0;
            var count_retries = 0;
            $.each(records, function(records_key, records_value) {
                var record_date = Math.floor(new Date(records_value[0]).getTime() / 1000);

                if (sales_from_left <= record_date && sales_to_left >= record_date) {
                    if (value == records_value[2]) {
                        if (records_value[17]) {
                        count_retries += 1;
                        var record_value_amount = records_value[17];
                        record_value_amount = record_value_amount.split('%')
                        var record_value_amount_converted = parseFloat(record_value_amount);
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
                        // revenue += 1;
                    }
                }

            })
            // console.log(revenue)
            // console.log(count_retries)
            service_revenue[key] = revenue / count_retries;

            // alert(count_retries)
        })

        var ctx_left = document.getElementById('tech_productivity_left').getContext('2d');

        // // Define the data for the chart
        var data = {
            labels: new_records,
            datasets: [{
                label: 'Tech Productivity',
                data: service_revenue, // Replace with your data values
                backgroundColor: "rgba(0, 156, 173)"
            }]
        };

        // // Define the options for the chart
        var options = {
            indexAxis: 'y',
            elements: {
              bar: {
                borderWidth: 2,
              }
            },
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value, index, values) {
                            return value + '%'; // Append '$' to the tick value
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
                },
                title: {
                  display: true,
                  text: 'Tech',
                  position: 'left'
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            var label = context.dataset.label || '';

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
            type: 'bar',
            data: data,
            options: options
        });
    }

    function create_charts_tech_productivity_right(records) {
        var sales_from_right = Math.floor(new Date($("#sales_from_right").val()).getTime() / 1000);
        var sales_to_right = Math.floor(new Date($("#sales_to_right").val()).getTime() / 1000)

        new_records = [...new Set(records.map(x => x[2]?x[2]:'unknown'))];

        var service_revenue = [];
        $.each(new_records, function(key, value) {
            var revenue = 0;
            var count_retries = 0;
            $.each(records, function(records_key, records_value) {
                var record_date = Math.floor(new Date(records_value[0]).getTime() / 1000);

                if (sales_from_right <= record_date && sales_to_right >= record_date) {
                    if (value == records_value[2]) {
                        if (records_value[17]) {
                        count_retries += 1;
                        var record_value_amount = records_value[17];
                        record_value_amount = record_value_amount.split('%')
                        var record_value_amount_converted = parseFloat(record_value_amount);
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
                        // revenue += 1;
                    }
                }

            })
            // console.log(revenue)
            // console.log(count_retries)
            service_revenue[key] = revenue / count_retries;

            // alert(count_retries)
        })

        var ctx_right = document.getElementById('tech_productivity_right').getContext('2d');

        // // Define the data for the chart
        var data = {
            labels: new_records,
            datasets: [{
                label: 'Tech Productivity',
                data: service_revenue, // Replace with your data values
                backgroundColor: "rgba(0, 156, 173)"
            }]
        };

        // // Define the options for the chart
        var options = {
            indexAxis: 'y',
            elements: {
              bar: {
                borderWidth: 2,
              }
            },
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value, index, values) {
                            return value + '%'; // Append '$' to the tick value
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
                },
                title: {
                  display: true,
                  text: 'Tech',
                  position: 'left'
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            var label = context.dataset.label || '';

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
        var myDoughnutChartRight = new Chart(ctx_right, {
            type: 'bar',
            data: data,
            options: options
        });
    }

    function create_charts_tech_productivity_default(records) {
        new_records = [...new Set(records.map(x => x[2]?x[2]:'unknown'))];

        var service_revenue = [];
        $.each(new_records, function(key, value) {
            var revenue = 0;
            var count_retries = 0;
            $.each(records, function(records_key, records_value) {
              if (value == records_value[2]) {
                if (records_value[17]) {
                  count_retries += 1;
                  var record_value_amount = records_value[17];
                  record_value_amount = record_value_amount.split('%')
                  var record_value_amount_converted = parseFloat(record_value_amount);
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
                // revenue += 1;
              }
            })
            // console.log(revenue)
            // console.log(count_retries)
            service_revenue[key] = revenue / count_retries;

            // alert(count_retries)
        })

        var ctx_left = document.getElementById('tech_productivity_left').getContext('2d');
        var ctx_right = document.getElementById('tech_productivity_right').getContext('2d');

        // // Define the data for the chart
        var data = {
            labels: new_records,
            datasets: [{
                label: 'Tech Productivity',
                data: service_revenue, // Replace with your data values
                backgroundColor: "rgba(0, 156, 173)"
            }]
        };

        // // Define the options for the chart
        var options = {
            indexAxis: 'y',
            elements: {
              bar: {
                borderWidth: 2,
              }
            },
            responsive: true,
            maintainAspectRatio: false,
            cutoutPercentage: 50, // Adjust the size of the hole (0-100)
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value, index, values) {
                            return value + '%'; // Append '$' to the tick value
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
                },
                title: {
                  display: true,
                  text: 'Tech',
                  position: 'left'
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            var label = context.dataset.label || '';

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