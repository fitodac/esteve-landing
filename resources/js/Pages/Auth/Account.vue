<script setup>
import { ref } from 'vue'
import PageLayout from '@/Layouts/PageLayout.vue'
import Intro from '@/Components/Pages/Intro.vue'

import FormPersonalInfo from '@/Components/Account/FormPersonal.vue'
import FormProfessionalInfo from '@/Components/Account/FormProfessional.vue'
import FormLocationInfo from '@/Components/Account/FormLocation.vue'
import FormSecurityInfo from '@/Components/Account/FormSecurity.vue'
import FormPreferencesInfo from '@/Components/Account/FormPreferences.vue'


const tab = ref('personal')
const tabnav = val => tab.value = val

const navbar = [
	{ id: 'personal', text: 'Información personal', icon: 'ri-user-2-fill' },
	{ id: 'profesional', text: 'Información profesional', icon: 'ri-pass-valid-fill' },
	{ id: 'location', text: 'Localización', icon: 'ri-map-pin-user-fill' },
	{ id: 'security', text: 'Seguridad', icon: 'ri-lock-fill' },
	{ id: 'preferences', text: 'Preferencias', icon: 'ri-checkbox-multiple-fill' },
]

const sending = ref(false)
const sendingForm = event => sending.value = event
</script>

<template>
	<PageLayout>
		<Intro 
			:data="{title: 'Mi cuenta'}"
			:containerMaxWidth="2"
			:titleBold="true"/>


		<section class="px-6 2xl:px-0">
			<div class="max-w-3xl mx-auto pb-16 -mt-10">
				<div class="grid grid-cols-5 gap-0 sm:grid-cols-7 md:grid-cols-12 md:gap-8">
					<div class="md:col-span-4">
						<div class="space-y-2">
							<button 
								v-for="item in navbar"
								:key="`tab-${item.id}`"
								class="text-sm font-medium whitespace-nowrap w-10 h-10 grid place-content-center rounded-md
								md:w-full md:flex md:items-center md:justify-start md:px-4"
								@click="tabnav(item.id)"
								:disabled="tab === item.id"
								:class="tab === item.id ? 'bg-brand-blue bg-opacity-10 text-brand-blue' : 'bg-brand-blue text-white'">
								<i :class="`${item.icon} text-xl md:hidden`"></i>
								<span class="hidden md:block">{{ item.text }}</span>
							</button>
						</div>
					</div>


					<div class="col-span-4 sm:col-span-6 md:col-span-8">
						<div :class="{'hidden': tab !== 'personal'}">
							<FormPersonalInfo 
								:sending="sending" 
								@formInProgress="sendingForm" />
						</div>
						
						<div :class="{'hidden': tab !== 'profesional'}">
							<FormProfessionalInfo 
								:sending="sending" 
								@formInProgress="sendingForm" />
						</div>
						
						<div :class="{'hidden': tab !== 'location'}">
							<FormLocationInfo 
								:sending="sending"
								@formInProgress="sendingForm" />
						</div>
						
						<div :class="{'hidden': tab !== 'security'}">
						<FormSecurityInfo 
							:sending="sending"
							@formInProgress="sendingForm" />
						</div>
						
						<div :class="{'hidden': tab !== 'preferences'}" >
							<FormPreferencesInfo 
								:sending="sending"
								@formInProgress="sendingForm" />
						</div>
					</div>
				</div>
			</div>
		</section>

	</PageLayout>
</template>