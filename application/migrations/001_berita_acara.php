<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_berita_acara extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'informasiDiterima' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '30',
                        ),
                        'tibaDilokasi' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'selesaiPemadaman' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'responTime' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'tanggal' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'rt' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '5',
                        ),
                        'rw' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '5',
                        ),
                        'kampung' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'desa' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'kecamatan' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'kota' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'namaPemilik' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                        ),
                        'jumlahPenghuni' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '10',
                        ),
                        'jenisBangunan' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                        ),
                        'areaTerbakar' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                        ),
                        'luasArea' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'asetKeseluruhan' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'asetTerselamatkan' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'luka' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '5',
                        ),
                        'meninggal' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '5',
                        ),
                        'jumlahMobil' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '5',
                        ),
                        'nomorPolisi' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'jumlahPetugas' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '5',
                        ),
                        'danru1' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'danru2' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'danton1' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'danton2' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('Berita_Acara');
        }

        public function down()
        {
                $this->dbforge->drop_table('Berita_Acara');
        }
}