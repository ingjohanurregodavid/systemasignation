<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';
import WarningButton from '@/Components/WarningButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Modal from '@/Components/Modal.vue';
import { Head,useForm } from '@inertiajs/vue3';
import { nextTick,ref} from 'vue'
import vueTailwindPaginationUmd from '@ocrv/vue-tailwind-pagination';
import Swal from 'sweetalert2';
import DangerButton from '@/Components/DangerButton.vue';

const nameImput=ref(null);
const modal=ref(false);
const title=ref('');
const operation=ref(1);
const id=ref('')

const props=defineProps({
    asignation_subjects:{type:Object},
    subjects:{type:Object},
    students:{type:Object},
    professors:{type:Object}
});
//Constante para usar el formulario
const form=useForm({
    idStudent:'',idSubject:'',idProfessor:''
});
const formPage=useForm({});

const onPageClick=(event)=>{
    formPage.get(route('Asignation.index',{page:event}))
}
const openModal=(op,idStudent,idSubject,idprofessors,asignation_subjects)=>{
    modal.value=true;
    nextTick(()=>nameImput.value.focus());
    operation.value=op;
    id.value=asignation_subjects;
    if(op==1){
        title.value='Create Asignation'
    }
    else{
        title.value='Edit Asignation';
        form.idStudent=idStudent;
        form.idSubject=idSubject;
        form.idProfessor=idprofessors;

    }
};

const  closeModal=()=>{
    modal.value=false;
    form.reset();
}

const save=()=>{
    if(operation.value==1){
        form.post(route('Asignation.store'),{
            onSuccess:()=>{ok('Asignation create')}
        });
    }else{
        form.patch(route('Asignation.update',id.value),{
            onSuccess:()=>{ok('Asignation update')}
            
        });
    }
}

const ok=(msj)=>{
    form.reset();
    closeModal();
    Swal.fire({title:msj,icon:'success'});
}

const deleteAsignation=(id,names)=>{
    const alert=Swal.mixin({
        buttonsStyling:true
    });
    alert.fire({
        title:'Are you sure delete   '+names+' ?',
        icon:'question',showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i>yes,delete',
        cancelButtonText:'<i class="fa-solid fa-ban"></i>Cancel'

    }).then((result)=>{
        if(result.isConfirmed){
            form.delete(route('Asignation.destroy',id),{
                onSuccess:()=>ok('Asignation delete')
            });
        }
    });
}
</script>
<template>
    <Head title="Asignation" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Asignation Subjects</h2>
        </template>

        <div class="py-12"> 
            <div class="bg-white grid v-screen place-items-center">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="mt-3 mb-3 flex">
                       <PrimaryButton @click="$event=>openModal(1)">
                            <i class="fa-solid fa-plus-circle"></i> Add
                       </PrimaryButton>                   
                    </div>
                </div>
                <div class="bg-white grid v-screen" >
                    <table class="table-auto border border-gray-400">
                       <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-4">#</th>
                            <th class="px-4 py-4">Student</th>
                            <th class="px-4 py-4">Subject</th>
                            <th class="px-4 py-4">Professor</th>
                            <th class="px-4 py-4"></th>
                            <th class="px-4 py-4"></th>
                        </tr>
                       </thead>                  
                    <tbody>
                        <tr v-for="asje, i in asignation_subjects.data" :key="asje.id">    
                            <td class="border border-gray-400 px-4 py-4">{{ i+1 }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ asje.student_names }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ asje.subject_names }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ asje.professor_names }}</td>
                            <td class="border border-gray-400 px-4 py-4"> 
                                <WarningButton @click="$event=>openModal(2,asje.student_id,asje.subject_id,asje.professor_id,asje.id)">
                                    <i class="fa-solid fa-edit"></i>
                                </WarningButton>
                            </td>
                            <td class="border border-gray-400 px-4 py-4"> 
                                <DangerButton @click="deleteAsignation(asje.id,asje.student_names)">
                                    <i class="fa-solid fa-trash"></i>
                                </DangerButton>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="bg-white grid v-screen place-items-center">
                <vueTailwindPaginationUmd
                :current="asignation_subjects.currentPage" :total="asignation_subjects.total"
                :per-page="asignation_subjects.perPage"
                @page-changed="$event=>onPageClick($event)">        
                </vueTailwindPaginationUmd>
            </div>
        </div>
        <Modal :show="modal" @close="closeModal">
            <h2 class="p-3 text-lg font.medium text-hray-900">{{ title }}</h2>

            <div class="p-3" >
                <InputLabel for="idStudent" value="Students:"></InputLabel>
                <SelectInput id="idStudent" :options="students" 
                v-model="form.idStudent" type="text" class="mt-1 block w-e/4">
                </SelectInput>
                <InputError :message="form.errors.idSubject" class="mt-2"></InputError>
            </div>
            <div class="p-3" >
                <InputLabel for="idsubject" value="Subject:"></InputLabel>
                <SelectInput id="idsubject" :options="subjects" 
                v-model="form.idSubject" type="text" class="mt-1 block w-e/4">
                </SelectInput>
                <InputError :message="form.errors.idSubject" class="mt-2"></InputError>
            </div>

            <div class="p-3" >
                <InputLabel for="idProfessor" value="Professor:"></InputLabel>
                <SelectInput id="idProfessor" :options="professors" 
                v-model="form.idProfessor" type="text" class="mt-1 block w-e/4">
                </SelectInput>
                <InputError :message="form.errors.idProfessor" class="mt-2"></InputError>
            </div>
            <div class="p-3 mt-6">
                <PrimaryButton :disabled="form.processing" @click="save">
                    <i class="fa-solid fa-end">Save</i>
                </PrimaryButton>
            </div>
            <div class="p-3 mt-6" flex-just>

            </div>
        </Modal>
    </AuthenticatedLayout>
</template>
