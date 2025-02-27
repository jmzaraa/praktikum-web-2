<?php
        $pdf = new FPDF('p', 'mm', 'A4');
        $pdf->Addpage();
        include 'report_header.php';
        $pdf->SetFont('Times', 'B', 18);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(0, 5, 'LAPORAN DATA KATAGORI', 0, 1, 'C');
        $pdf->Cell(30, 8, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(20, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(80, 6, 'NAMA KATAGORI', 1, 0, 'C');
        $pdf->Cell(80, 6, 'DESKRIPSI', 1, 1, 'C');

        $i = 1;
        $data = $this->db->get('katagori')->result_array();
        foreach ($data as $d) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(20, 6, $i++, 1, 0);
            $pdf->Cell(80, 6, $d['name'], 1, 0);
            $pdf->Cell(80, 6, $d['deskripsi_k'], 1, 1);

        }
        $pdf->SetFont('Times', '', 10);
        $pdf->Output('laporan_katagori.pdf', 'I');