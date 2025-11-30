<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            // ============================
            // MÉDICOS – CRM
            // ============================
            'Alergia e Imunologia',
            'Anestesiologia',
            'Angiologia',
            'Cancerologia (Oncologia)',
            'Cardiologia',
            'Cirurgia Cardiovascular',
            'Cirurgia da Mão',
            'Cirurgia de Cabeça e Pescoço',
            'Cirurgia do Aparelho Digestivo',
            'Cirurgia Geral',
            'Cirurgia Pediátrica',
            'Cirurgia Plástica',
            'Cirurgia Torácica',
            'Cirurgia Vascular',
            'Clínica Médica',
            'Coloproctologia',
            'Dermatologia',
            'Endocrinologia e Metabologia',
            'Gastroenterologia',
            'Geriatria',
            'Ginecologia e Obstetrícia',
            'Hematologia e Hemoterapia',
            'Homeopatia',
            'Infectologia',
            'Mastologia',
            'Medicina de Família e Comunidade',
            'Medicina do Trabalho',
            'Medicina Esportiva',
            'Medicina Física e Reabilitação',
            'Medicina Intensiva',
            'Medicina Legal e Perícia Médica',
            'Medicina Nuclear',
            'Medicina Preventiva e Social',
            'Nefrologia',
            'Neurocirurgia',
            'Neurologia',
            'Oftalmologia',
            'Ortopedia e Traumatologia',
            'Otorrinolaringologia',
            'Patologia',
            'Patologia Clínica / Medicina Laboratorial',
            'Pediatria',
            'Pneumologia',
            'Psiquiatria',
            'Radiologia e Diagnóstico por Imagem',
            'Radioterapia',
            'Reumatologia',
            'Urologia',

            // ============================
            // PSICOLOGIA – CRP
            // ============================
            'Psicologia Clínica',
            'Psicologia Hospitalar',
            'Psicologia Organizacional e do Trabalho',
            'Psicologia Educacional',
            'Psicologia do Esporte',
            'Psicologia Jurídica',
            'Psicologia Social',
            'Neuropsicologia',
            'Psicopedagogia',
            'Psicanálise',
            'Terapia Cognitivo-Comportamental',
            'Terapia Humanista',
            'Avaliação Psicológica',

            // ============================
            // ENFERMAGEM – COREN
            // ============================
            'Enfermagem Geral',
            'Enfermagem Obstétrica',
            'Enfermagem Pediátrica',
            'Enfermagem Psiquiátrica',
            'Enfermagem do Trabalho',
            'Enfermagem em UTI',
            'Enfermagem Cirúrgica',
            'Enfermagem Oncológica',
            'Enfermagem Geriátrica',
            'Enfermagem em Saúde Pública',
            'Enfermagem em Urgência e Emergência',

            // ============================
            // ODONTOLOGIA – CRO
            // ============================
            'Cirurgia e Traumatologia Bucomaxilofacial',
            'Dentística Restauradora',
            'Endodontia',
            'Estomatologia',
            'Implantodontia',
            'Odontogeriatria',
            'Odontologia do Trabalho',
            'Odontologia Estética',
            'Odontopediatria',
            'Ortodontia',
            'Ortopedia Funcional dos Maxilares',
            'Patologia Bucal',
            'Periodontia',
            'Prótese Dentária',
            'Radiologia Odontológica',

            // ============================
            // FARMÁCIA – CRF
            // ============================
            'Farmácia Clínica',
            'Farmácia Hospitalar',
            'Análises Clínicas',
            'Indústria Farmacêutica',
            'Toxicologia',
            'Manipulação Magistral',
            'Farmacovigilância',
            'Controle de Qualidade',

            // ============================
            // FISIOTERAPIA – CREFITO
            // ============================
            'Fisioterapia Ortopédica',
            'Fisioterapia Neurológica',
            'Fisioterapia Respiratória',
            'Fisioterapia Cardiovascular',
            'Fisioterapia Desportiva',
            'Fisioterapia Geriátrica',
            'Fisioterapia Pediátrica',
            'Fisioterapia Pélvica',
            'Fisioterapia Dermatofuncional',

            // ============================
            // TERAPIA OCUPACIONAL – CREFITO
            // ============================
            'Terapia Ocupacional em Saúde Mental',
            'Terapia Ocupacional Infantil',
            'Reabilitação Física e Funcional',
            'Terapia Ocupacional Social',

            // ============================
            // NUTRIÇÃO – CRN
            // ============================
            'Nutrição Clínica',
            'Nutrição Esportiva',
            'Nutrição Hospitalar',
            'Nutrição em Saúde Coletiva',
            'Nutrição Funcional',
            'Nutrição Estética',
            'Nutrição Materno-Infantil',
            'Nutrição Geriátrica',

            // ============================
            // FONOAUDIOLOGIA – CRFa
            // ============================
            'Voz',
            'Audiologia',
            'Linguagem',
            'Motricidade Orofacial',
            'Disfagia',
            'Fonoaudiologia Educacional',
            'Fonoaudiologia Hospitalar',

            // ============================
            // BIOMEDICINA – CRBM
            // ============================
            'Biomedicina Estética',
            'Análises Clínicas (Biomedicina)',
            'Imagenologia (Biomedicina)',
            'Toxicologia (Biomedicina)',
            'Acupuntura (Biomedicina)',
            'Reprodução Humana',
            'Biologia Molecular',
            'Perícia Criminal',

            // ============================
            // BIOLOGIA – CRBio
            // ============================
            'Biologia Ambiental',
            'Biotecnologia',
            'Microbiologia',
            'Genética',
            'Zoologia',
            'Botânica',
            'Educação Ambiental',

            // ============================
            // SERVIÇO SOCIAL – CRESS
            // ============================
            'Serviço Social Clínico',
            'Serviço Social Hospitalar',
            'Serviço Social Escolar',
            'Serviço Social Jurídico',
            'Serviço Social Empresarial',

            // ============================
            // EDUCAÇÃO FÍSICA – CREF
            // ============================
            'Educação Física Escolar',
            'Treinamento Esportivo',
            'Personal Trainer',
            'Reabilitação e Condicionamento Físico',
            'Fisiologia do Exercício',
            'Prescrição de Atividade Física para Saúde',

            // ============================
            // MEDICINA VETERINÁRIA – CRMV
            // ============================
            'Clínica de Pequenos Animais',
            'Cirurgia Veterinária',
            'Patologia Animal',
            'Reprodução Animal',
            'Medicina Veterinária Preventiva',
            'Anestesiologia Veterinária',
            'Zootecnia',

            // ============================
            // TÉCNICOS E TECNÓLOGOS
            // ============================
            'Radiologia',
            'Estética',
            'Massoterapia',
            'Podologia',
            'Acupuntura',
            'Técnico em Enfermagem',
            'Técnico em Prótese Dentária',
            'Técnico em Óptica'
        ];

        DB::table('specialties')->insert(
            collect($specialties)->map(fn ($name) => [
                'name' => $name,
                'active' => true,
                'description' => null,
                'created_at' => now(),
                'updated_at' => now()
            ])->toArray()
        );
    }
}
