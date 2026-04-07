/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

define([
    'underscore',
    'Magento_Ui/js/grid/columns/multiselect'
], function (_, Multiselect) {
    'use strict';

    describe('ui/js/grid/columns/multiselect', function () {
        var multiSelect;

        beforeEach(function () {
            multiSelect = new Multiselect({
                rows: [],
                index: 'index',
                name: 'name',
                indexField: 'id',
                dataScope: 'scope',
                provider: 'provider'
            });
            multiSelect.source = {
                /** Stub */
                set: function () {}
            };
            spyOn(multiSelect.source, 'set');
        });

        afterEach(function () {
        });

        it('Default state - Select no rows', function () {
<<<<<<< HEAD
            multiSelect.rows([{
                id: 1
            }, {
                id: 2
            }, {
                id: 3
            }]);

            expect(multiSelect.allSelected()).toBeFalsy();
=======
            multiSelect.rows.push({
                id: 1
            });
            multiSelect.rows.push({
                id: 2
            });
            multiSelect.rows.push({
                id: 3
            });

            expect(multiSelect.allSelected()).toBeFalse();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            expect(multiSelect.excluded().toString()).toEqual('');
            expect(multiSelect.selected().toString()).toEqual('');
        });

        it('Select specific several rows on several pages', function () {
            multiSelect.selected.push(4);
            multiSelect.selected.push(5);

<<<<<<< HEAD
            expect(multiSelect.allSelected()).toBeFalsy();
=======
            expect(multiSelect.allSelected()).toBeUndefined();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            expect(multiSelect.excluded().toString()).toEqual('');
            expect(multiSelect.selected().toString()).toEqual('4,5');
        });

        it('Select all rows on several pages', function () {
            multiSelect.rows([{
                id: 1
            }, {
                id: 2
            }]);
            multiSelect.selectPage();
            multiSelect.rows([{
                id: 3
            }, {
                id: 4
            }]);
            multiSelect.selectPage();

<<<<<<< HEAD
            expect(multiSelect.allSelected()).toBeFalsy();
=======
            expect(multiSelect.allSelected()).toBeUndefined();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            expect(multiSelect.excluded().toString()).toEqual('');
            expect(multiSelect.selected().toString()).toEqual('1,2,3,4');
        });

        it('Select all rows on current page with some specific rows on another page', function () {
            multiSelect.rows([{
                id: 1
            }, {
                id: 2
            }]);
            multiSelect.rows([{
                id: 3
            }, {
                id: 4
            }]);
            multiSelect.selectPage();
            multiSelect.rows([{
                id: 5
            }, {
                id: 6
            }]);
            multiSelect.selected.push(6);
<<<<<<< HEAD
            expect(multiSelect.allSelected()).toBeFalsy();
=======
            expect(multiSelect.allSelected()).toBeUndefined();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            expect(multiSelect.excluded().toString()).toEqual('5');
            expect(multiSelect.selected().toString()).toEqual('3,4,6');
        });

        it('Select all rows on several pages without some specific rows', function () {
            multiSelect.rows([{
                id: 1
            }, {
                id: 2
            }]);
            multiSelect.rows([{
                id: 3
            }, {
                id: 4
            }]);
            multiSelect.selectPage();
            multiSelect.selected.remove(4); // remove second

<<<<<<< HEAD
            expect(multiSelect.allSelected()).toBeFalsy();
=======
            expect(multiSelect.allSelected()).toBeUndefined();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            expect(multiSelect.excluded().toString()).toEqual('4');
            expect(multiSelect.selected().toString()).toEqual('3');
        });

        it('Select all rows all over the Grid', function () {
            multiSelect.rows([{
                id: 1
            }, {
                id: 2
            }]);
            multiSelect.selectAll();
            multiSelect.rows([{
                id: 3
            }, {
                id: 4
            }]);

<<<<<<< HEAD
            expect(multiSelect.allSelected()).toBeFalsy();
=======
            expect(multiSelect.allSelected()).toBeUndefined();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            expect(multiSelect.excluded().toString()).toEqual('');
            expect(multiSelect.selected().toString()).toEqual('3,4,1,2');
        });

        it('Select all rows all over the Grid and deselects all records', function () {
            multiSelect.rows([{
                id: 1
            }, {
                id: 2
            }]);

            multiSelect.selectAll();
            multiSelect.deselectAll();
            multiSelect.indetermine(2);
            expect(multiSelect.togglePage().selected()).toEqual([1, 2]);
        });

        it('Select all rows all over the Grid without all rows on current page but with specific rows on another page',
            function () {
                multiSelect.rows([{
                    id: 1
                }, {
                    id: 2
                }]);
                multiSelect.rows([{
                    id: 3
                }, {
                    id: 4
                }]);
                multiSelect.selectAll();
                multiSelect.deselectPage();
                multiSelect.rows([{
                    id: 5
                }, {
                    id: 6
                }]);

<<<<<<< HEAD
                expect(multiSelect.allSelected()).toBeFalsy();
                expect(multiSelect.excluded().toString()).toEqual('3,4');
                expect(multiSelect.selected().toString()).toEqual('5,6');
            });

        it('updateState does not call selectAll when all items are selected', function () {
            multiSelect.rows([{ id: 1 }, { id: 2 }]);
            multiSelect.totalRecords(2);
            multiSelect.excludeMode(false);
            multiSelect.selected([1, 2]);
            multiSelect.preserveSelectionsOnFilter = false;
            spyOn(multiSelect, 'selectAll').and.callThrough();
            multiSelect.updateState();

            expect(multiSelect.selectAll).not.toHaveBeenCalled();
        });
=======
                expect(multiSelect.allSelected()).toBeUndefined();
                expect(multiSelect.excluded().toString()).toEqual('3,4');
                expect(multiSelect.selected().toString()).toEqual('5,6');
            });
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    });
});
