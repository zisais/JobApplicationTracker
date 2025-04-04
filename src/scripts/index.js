"use strict";

let allApps = [];

$.get("indexHelper.php", (result) => {
    allApps = JSON.parse(result);
    let rows = generateRows(allApps);
    rows.forEach((row) => {
        $('#tableBody').append(row);
    });
});

$(document).on('click', '.delete', function() {
    const rowId = $(this).closest('tr').attr('id');
    $(this).closest('tr').remove();
    $.post('delete.php', {id: rowId}, () => {});
});

const generateRows = (apps) => {
    let rows = [];
    apps.forEach((app) => {
        rows.push(generateRow(app));
    });

    return rows;
}

const generateRow = (app) => {
    return `<tr class="${app['status']}" id="${app['id']}">
                <td class="has-text-centered has-text-black">${app['company']}</td>
                <td class="has-text-centered has-text-black">${app['title']}</td>
                <td class="has-text-centered has-text-black last-column">
                    ${app['appDate']}
                    <button class="delete"></button>
                </td>
    </tr>`;
}

const deleteRow = (id) => {

}