/**
 * This file is part of the O2System PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Steeve Andrian Salim
 * @copyright      Copyright (c) Steeve Andrian Salim
 */
// ------------------------------------------------------------------------

/**
 * O2System CRUD Table
 */
$(function () {
    var crudTable = new Object();
    crudTable.form = $('[data-role="table-crud"]');
    crudTable.columns = $('[data-role="table-crud-columns"]');
    crudTable.search = crudTable.form.find('[data-role="table-crud-search"]');

    // Table Columns
    crudTable.columns.on('change', '[data-toggle="table-crud-columns"]', function(){
        crudTable.form.find('[data-column="'+ $(this).data('column') +'"]').toggle();
    });

    // Table Sorter
    crudTable.form.find('thead > tr > th.col-sortable').each(function (column) {
        $(this).hover(
            function () {
                $(this).addClass('focus');
                $(this).find('i').removeClass('text-muted');
            }, function () {
                $(this).removeClass('focus');
                $(this).find('i').addClass('text-muted');
            }
        );

        $(this).click(function () {
            if ($(this).is('.asc')) {
                $(this).removeClass('asc');
                $(this).addClass('desc selected');
                sortOrder = -1;
            }
            else {
                $(this).addClass('asc selected');
                $(this).removeClass('desc');
                sortOrder = 1;
            }
            $(this).siblings().removeClass('asc selected');
            $(this).siblings().removeClass('desc selected');
            crudTable.sortableData = crudTable.form.find('tbody >tr:has(td)').get();
            crudTable.sortableData.sort(function (a, b) {
                var aValue = $(a).children('td').eq(column).text().toUpperCase();
                var bValue = $(b).children('td').eq(column).text().toUpperCase();
                if ($.isNumeric(aValue) && $.isNumeric(bValue))
                    return sortOrder == 1 ? aValue - bValue : bValue - aValue;
                else
                    return (aValue < bValue) ? -sortOrder : (aValue > bValue) ? sortOrder : 0;
            });
            $.each(crudTable.sortableData, function (index, row) {
                crudTable.form.find('tbody').append(row);
            });
        });

    });

    // Table Filter
    crudTable.search.keyup(function() {
        var searchQuery = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
        console.log(searchQuery);

        crudTable.form.find('tbody > tr').show().filter(function() {
            var searchText = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~searchText.indexOf(searchQuery);
        }).hide();
    });

    crudTable.form.on('click', '[data-action="reset"]', function () {
        crudTable.form.find('tbody > tr').show();
    });

    crudTable.form.on('click', '[data-action="reload"]', function () {
        location.reload();
    });

    // Table Checkbox
    crudTable.form.on('change', '[data-toggle="table-crud-checkbox"]', function(){
        crudTable.row = crudTable.form.find('tbody > tr');
        crudTable.row.toggleClass('selected');
        crudTable.checkboxes = crudTable.row.find('[data-role="table-crud-checkbox"]');
        crudTable.checkboxes.each(function(){
            if( crudTable.row.hasClass('selected') ) {
                $(this).attr('checked','checked');
            } else {
                $(this).removeAttr('checked');
            }
        });
    });

    // Table Select
    crudTable.form.on('click', 'tbody > tr', function(){
        crudTable.checkbox = $(this).find('[data-role="table-crud-checkbox"]');
        if( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            crudTable.checkbox.removeAttr('checked');
        } else {
            $(this).addClass('selected');
            crudTable.checkbox.attr('checked', 'checked');
        }
    });
});