<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_rescue extends CI_Migration {

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
                        'idKecamatan' => array(
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
                        'jenisEvakuasi' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                        ),
                        'jenisPenyelamatan' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                        ),
                        'keteranganPenyelamatan' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                        ),
                        'luka' => array(
                            'type' => 'INT',
                            'constraint' => '5',
                        ),
                        'meninggal' => array(
                            'type' => 'INT',
                            'constraint' => '5',
                        ),
                        'jumlahMobil' => array(
                            'type' => 'INT',
                            'constraint' => '5',
                        ),
                        'nomorPolisi' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '30',
                        ),
                        'jumlahPetugas' => array(
                            'type' => 'INT',
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
                $this->dbforge->create_table('Rescue');
        }

        public function down()
        {
                $this->dbforge->drop_table('Rescue');
        }
}