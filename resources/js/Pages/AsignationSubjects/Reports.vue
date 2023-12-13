<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import {ref} from 'vue';
import InputLabel from '@/Components/InputLabel.vue';
import SelectInput from '@/Components/SelectInput.vue';
import DataTable from 'datatables.net-vue3';
import 'datatables.net-dt/css/jquery.dataTables.css';
import ButtonsHtml5 from 'datatables.net-buttons/js/buttons.html5';
import 'datatables.net-buttons/js/buttons.print';
import 'datatables.net-responsive-dt';
import 'datatables.net-responsive-dt/css/responsive.dataTables.min.css';
import JsZip from 'jszip';
import pdfmake from "pdfmake/build/pdfmake";
import * as pdfFonts from "pdfmake/build/vfs_fonts";

pdfmake.vfs=pdfFonts.pdfmake ? pdfFonts.pdfmake.vfs :pdfmake.vfs;
window.JSZip=JsZip;
DataTable.use(ButtonsHtml5);

const props= defineProps({
    asignation_subjects:{type:Object}
});

const columns1=ref([]);
const buttons1=ref([]);
const report=ref('1');
const types=ref([{'id':'1','name':'Asignations'}]);

columns1.value=[{data:null,render:function(data,type,row,meta)
    {return (meta.row+1)}},
    {data:'student_names'},
    {data:'subject_names'},
    {data:'professor_names'}
]

buttons1.value=[
    {
        title:'Asignations',
        extend:'excelHtml5',
        tetxt:'<i class="fa-solid fa-file-excel"></i>Excel',
        className:'inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'
    },
    {
        title:'Asignations',
        extend:'print',
        tetxt:'<i class="fa-solid fa-file-print"> </i> Print',
        className:'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'
    },
    {
        title:'Asignations',
        extend:'copy',
        tetxt:'<i class="fa-solid fa-file-copy"></i>Copy',
        className:'inline-flex items-center px-4 py-2 bg-gray-200 border border-gray rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'
    }
]
</script>

<template>
    <Head title="Reports" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Reports Asignation Subjects</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <InputLabel for="rep" value="Report:"></InputLabel>
                    <SelectInput id="rep" class="mt-1 block w-3/4"
                    v-model="report" :options="types"></SelectInput>
                </div>
                <div v-if="report==1" class="px-6 py-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <DataTable :data="asignation_subjects" :columns="columns1" 
                    class="w-full border border-gray-400"
                    :options="{responsive:true,autoWidth:false,dom:'Bfrtip',buttons: buttons1}">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-4">#</th>
                            <th class="px-4 py-4">Student</th>
                            <th class="px-4 py-4">Subject</th>
                            <th class="px-4 py-4">Professor</th>
                        </tr>
                       </thead>    
                    </DataTable>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
