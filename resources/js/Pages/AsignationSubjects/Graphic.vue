<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import {ref} from 'vue';
import {Bar} from 'vue-chartjs';
import { Chart as chartJs,Title,Tooltip,Legend,BarElement,CategoryScale,LinearScale,ArcElement } from 'chart.js';

chartJs.register(Title,Tooltip,Legend,BarElement,CategoryScale,LinearScale,ArcElement);

const props= defineProps({
    data:{type:Object}
});

const students=ref([]);

const asignation_subjects=ref([]);
const charData=ref([]);
const charOptions=ref([]);
const colors=ref([]);

const random=()=>{
    return Math.floor(Math.random()*256);
}
props.data.map((row)=>{
    students.value.push(row.student_names),
    asignation_subjects.value.push(row.count),
    colors.value.push("rgb("+random()+","+random()+","+random()+")"),
    charOptions.value={responsive:true},
    charData.value={
        labels:students.value,
        datasets:[
            {label:'AsignationSubjects',data:asignation_subjects.value,backgroundColor:colors}
        ]
    }
});
</script>

<template>
    <Head title="Graphic" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Graphic Asignation Subjects</h2>
        </template>

        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <Bar :data="charData" :options="charOptions">

                    </Bar>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
