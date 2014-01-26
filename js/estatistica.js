var dataSource = [
    { company: 'ExxonMobil', 2004: 277.02, 2005: 362.53},
    { company: 'General Electric', 2004: 328.54, 2005: 348.45},
    { company: 'Microsoft', 2004: 297.02, 2005: 279.02},
    { company: 'Citigroup', 2004: 255.3, 2005: 230.93},
    { company: 'Royal Dutch Shell plc', 2004: 173.54, 2005: 203.52},
    { company: 'Procter &amp; Gamble', 2004: 131.89, 2005: 197.12}
];
 
$(function () {
    $("#chartContainer").dxChart({
        dataSource: dataSource,
        commonSeriesSettings: {
            argumentField: 'company',
            type: 'bar'
        },
        series: [
            { valueField: '2004', name: '2004' },
            { valueField: '2005', name: '2005' }
        ],
        legend: {
            verticalAlignment: 'bottom',
            horizontalAlignment: 'center'
        },
        title: {
            text: 'Corporations with Highest Market Value'
        }
    });
});