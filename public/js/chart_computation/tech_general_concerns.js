$(document).ready(function() {
    const TECH_PRODUCTIVITY_SPREADSHEET_ID = '1VpWS5RmJZBRdBqVRUPwySGLetVPO3iqVYR8JVg5aYUo';

    gapi.load('client', initTechGeneralConcerns);

    function initTechGeneralConcerns(side) {
        gapi.client.init({
            apiKey: 'AIzaSyBzOvEQGONKm2a3VoC9g6zN4gFh0cfp9Sk',
            discoveryDocs: ['https://sheets.googleapis.com/$discovery/rest?version=v4'],
        }).then(function () {
            // After the API is loaded, you can use it to fetch data
            fetchGoogleSheetDataTechGeneralConcerns(side);
        });
    }

    function fetchGoogleSheetDataTechGeneralConcerns(side) {
        gapi.client.sheets.spreadsheets.values.get({
            spreadsheetId: TECH_PRODUCTIVITY_SPREADSHEET_ID,
            range: `'Tech General Concerns'!B542:I`, // Change this to the specific sheet and range you want to fetch
        }).then(function (response) {
            const values = response.result.values;

            create_charts_tech_general_concerns_default(values);

        }, function (error) {
            console.error('Error fetching Google Sheet data:', error);
        });
    }

    function create_charts_tech_general_concerns_default(records) {
        console.log('tech concern')
        console.log(records)

        tech_name = [...new Set(records.map(x => x[2]?x[2]:'unknown'))];

        // var tech_data = [];
        // $.each(new_records, function(key, value) {
        //     var concerns_data = [];
        //     $.each(records, function(concerns_key, concerns_value) {
        //         if ()
        //         concerns_data[value] = concerns_value[3];
        //         // concerns_data[key]. = concerns_value[3];
        //     })

        //     console.log(concerns_data)
        // })

        var final_production = [];
        var final_loss = [];
        var final_driving = [];
        var final_attendance = [];
        var tech_name_new = [];
        $.each(tech_name, function(tech_key, tech_value) {

            var production = 0;
            var loss = 0;
            var driving = 0;
            var attendance = 0;
            var techname = '';
            $.each(records, function(records_key, records_value) {
                // console.log(records_value[3])
                if (records_value[2] == tech_value) {

                    techname = tech_value;

                    if (records_value[3] == "Production") {
                        production += 1;
                    } else if (records_value[3] == "Loss/Damages") {
                        loss += 1;
                    } else if (records_value[3] == "Driving") {
                        driving += 1;
                    } else if (records_value[3] == "Attendance/Hours") {
                        attendance += 1;
                    }
                }
            })

            tech_name_new.push(techname);

            final_production[tech_value] = production;
            final_loss[tech_value] = loss;
            final_driving[tech_value] = driving;
            final_attendance[tech_value] = attendance;

        })

        // console.log(tech_name_new)
        // console.log(final_production)
        // console.log(final_loss)
        // console.log(final_driving)
        // console.log(final_attendance)

        // console.log(Object.values(final_production))
        // console.log(Object.keys(final_production))

        var final_tech = Object.keys(final_production);
        var final_production = Object.values(final_production);
        var final_loss = Object.values(final_loss);
        var final_driving = Object.values(final_driving);
        var final_attendance = Object.values(final_attendance);

        // console.log(final_production)
        // console.log(final_loss)
        // console.log(final_driving)
        // console.log(final_attendance)

        


        

        var ctx = document.getElementById('tech_general_concerns').getContext('2d');

        // // Define the data for the chart
        var data = {
            labels: final_tech, // Name
            datasets: [
                {
                    label: 'Production', // Item label
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    data: final_production // Item Value
                },
                {
                    label: 'Loss/Damage',
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    data: final_loss
                },
                {
                    label: 'Driving',
                    backgroundColor: 'rgba(255, 206, 86, 0.5)',
                    data: final_driving
                },
                {
                    label: 'Attendance/Hours',
                    backgroundColor: 'rgba(255, 255, 86, 0.5)',
                    data: final_attendance
                }
            ]
        };

        // Chart options
        var options = {
            indexAxis: 'y',
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true
                }
            }
        };

        //Create the stacked bar chart
        var myStackedBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    }
})