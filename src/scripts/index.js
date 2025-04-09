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

$(document).on('click', '.edit', function() {
    const rowId = $(this).closest('tr').attr('id');
    window.location.href = `editAppForm.php?id=${rowId}`;
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
                <td class="has-text-centered has-text-black company">${app['company']}</td>
                <td class="has-text-centered has-text-black appTitle">${app['title']}</td>
                <td class="has-text-centered has-text-black last-column date">
                    ${app['appDate']}
                    <button class="edit"></button>
                    <button class="delete"></button>
                </td>
    </tr>`;
}