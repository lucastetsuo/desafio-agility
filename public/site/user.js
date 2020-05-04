let sortDirection = false;
let tableData;
let filteredData;

function loadTableData(tableData) {
    const tableBody = document.getElementById('tableData');
    let dataHtml = '';

    for (let data of tableData) {
        if (data.customer == 'Agility') {
            dataHtml += `<tr class="table-primary"><td>${data.id}</td><td>${data.name}</td><td>${data.customer}</td><td>${data.email}</td><td>${data.status}</td></tr>`;
        }
        else {
            dataHtml += `<tr><td>${data.id}</td><td>${data.name}</td><td>${data.customer}</td><td>${data.email}</td><td>${data.status}</td></tr>`;
        }
    }

    tableBody.innerHTML = dataHtml;
}

function sortColumn(columnName) {
    const dataType = typeof filteredData[0][columnName];

    sortDirection = !sortDirection;
    switch (dataType) {
        case 'number':
            sortNumberColumn(sortDirection, columnName)
            break;
        default:
            sortStringColumn(sortDirection, columnName)
            break;
    }
    loadTableData(filteredData);
}

function sortNumberColumn(sort, columnName) {
    filteredData = filteredData.sort((val1, val2) => {
        return sort ? val1[columnName] - val2[columnName] : val2[columnName] - val1[columnName]
    });
}

function sortStringColumn(sort, columnName) {
    filteredData.sort((val1, val2) => {
        if (val1[columnName] > val2[columnName]) { return -1; }
        else if (val1[columnName] < val2[columnName]) { return 1; }
    })
    if (sort) {
        filteredData = filteredData.reverse();
    }
}

function search() {
    filteredData = tableData;
    searchVal = document.getElementById('search').value;
    filteredData = tableData.filter(function (data) {
        return data.name.includes(searchVal) || data.customer.includes(searchVal) || data.email.includes(searchVal);
    });
    loadTableData(filteredData);
}
