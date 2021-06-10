
package calculadortot;

import java.awt.Color;
import java.awt.Frame;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.script.ScriptEngine;
import javax.script.ScriptEngineManager;
import javax.script.ScriptException;
import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JLabel;


public class Calculadora extends javax.swing.JFrame {

   ScriptEngineManager sem = new ScriptEngineManager();
   ScriptEngine se= sem.getEngineByName("JavaScript");
    public Calculadora() {
        initComponents();
        setLocationRelativeTo(null);
    }

 
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jButton1 = new javax.swing.JButton();
        jPanel1 = new javax.swing.JPanel();
        txtResultado = new javax.swing.JLabel();
        jButton8 = new javax.swing.JButton();
        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        txtOperation = new javax.swing.JTextField();
        jPanel2 = new javax.swing.JPanel();
        punto = new javax.swing.JButton();
        Menosuno = new javax.swing.JButton();
        Potencia = new javax.swing.JButton();
        division = new javax.swing.JButton();
        multi = new javax.swing.JButton();
        resta = new javax.swing.JButton();
        Igual = new javax.swing.JButton();
        suma = new javax.swing.JButton();
        Borrar = new javax.swing.JButton();
        jButton12 = new javax.swing.JButton();
        jButton13 = new javax.swing.JButton();
        jButton14 = new javax.swing.JButton();
        tres = new javax.swing.JButton();
        seis = new javax.swing.JButton();
        nueve = new javax.swing.JButton();
        cambio = new javax.swing.JButton();
        ocho = new javax.swing.JButton();
        cinco = new javax.swing.JButton();
        cuatro = new javax.swing.JButton();
        siete = new javax.swing.JButton();
        cero = new javax.swing.JButton();
        raz = new javax.swing.JButton();
        entreUno = new javax.swing.JButton();
        renDos = new javax.swing.JButton();
        renUno = new javax.swing.JButton();
        suma1 = new javax.swing.JButton();

        jButton1.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        jButton1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        jButton1.setText("C");
        jButton1.setToolTipText("");
        jButton1.setFocusPainted(false);
        jButton1.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jButton1.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        jButton1.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        getContentPane().setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jPanel1.setBackground(new java.awt.Color(231, 255, 255));
        jPanel1.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        txtResultado.setFont(new java.awt.Font("Verdana", 0, 36)); // NOI18N
        txtResultado.setForeground(new java.awt.Color(0, 19, 69));
        txtResultado.setHorizontalAlignment(javax.swing.SwingConstants.TRAILING);
        jPanel1.add(txtResultado, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, 70, 330, 50));

        jButton8.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/dark.png"))); // NOI18N
        jButton8.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton8ActionPerformed(evt);
            }
        });
        jPanel1.add(jButton8, new org.netbeans.lib.awtextra.AbsoluteConstraints(280, 10, 60, 20));

        jLabel1.setFont(new java.awt.Font("Tahoma", 0, 100)); // NOI18N
        jLabel1.setForeground(new java.awt.Color(255, 153, 0));
        jLabel1.setText("·");
        jLabel1.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jLabel1MouseClicked(evt);
            }
        });
        jPanel1.add(jLabel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 10, -1, 20));

        jLabel2.setFont(new java.awt.Font("Tahoma", 0, 100)); // NOI18N
        jLabel2.setForeground(new java.awt.Color(204, 0, 0));
        jLabel2.setText("·");
        jLabel2.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jLabel2MouseClicked(evt);
            }
        });
        jPanel1.add(jLabel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 10, -1, 20));

        txtOperation.setBackground(new java.awt.Color(204, 255, 255));
        txtOperation.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        txtOperation.setHorizontalAlignment(javax.swing.JTextField.TRAILING);
        jPanel1.add(txtOperation, new org.netbeans.lib.awtextra.AbsoluteConstraints(60, 40, 280, 30));

        getContentPane().add(jPanel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 0, 350, 160));

        jPanel2.setBackground(new java.awt.Color(204, 255, 255));
        jPanel2.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        punto.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        punto.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        punto.setText(".");
        punto.setToolTipText("");
        punto.setFocusPainted(false);
        punto.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        punto.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        punto.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        punto.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                puntoActionPerformed(evt);
            }
        });
        jPanel2.add(punto, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, 260, 50, 50));

        Menosuno.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        Menosuno.setForeground(new java.awt.Color(0, 51, 153));
        Menosuno.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        Menosuno.setText("<-");
        Menosuno.setToolTipText("");
        Menosuno.setFocusPainted(false);
        Menosuno.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        Menosuno.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        Menosuno.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        Menosuno.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                MenosunoActionPerformed(evt);
            }
        });
        jPanel2.add(Menosuno, new org.netbeans.lib.awtextra.AbsoluteConstraints(80, 20, 50, 50));

        Potencia.setFont(new java.awt.Font("Tahoma", 1, 8)); // NOI18N
        Potencia.setForeground(new java.awt.Color(0, 51, 153));
        Potencia.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        Potencia.setText("x^2");
        Potencia.setToolTipText("");
        Potencia.setFocusPainted(false);
        Potencia.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        Potencia.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        Potencia.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        Potencia.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                PotenciaActionPerformed(evt);
            }
        });
        jPanel2.add(Potencia, new org.netbeans.lib.awtextra.AbsoluteConstraints(150, 20, 50, 50));

        division.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        division.setForeground(new java.awt.Color(0, 51, 153));
        division.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        division.setText("/");
        division.setToolTipText("");
        division.setFocusPainted(false);
        division.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        division.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        division.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        division.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                divisionActionPerformed(evt);
            }
        });
        jPanel2.add(division, new org.netbeans.lib.awtextra.AbsoluteConstraints(220, 20, 50, 50));

        multi.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        multi.setForeground(new java.awt.Color(0, 51, 153));
        multi.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        multi.setText("*");
        multi.setToolTipText("");
        multi.setFocusPainted(false);
        multi.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        multi.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        multi.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        multi.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                multiActionPerformed(evt);
            }
        });
        jPanel2.add(multi, new org.netbeans.lib.awtextra.AbsoluteConstraints(220, 80, 50, 50));

        resta.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        resta.setForeground(new java.awt.Color(0, 51, 153));
        resta.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        resta.setText("-");
        resta.setToolTipText("");
        resta.setFocusPainted(false);
        resta.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        resta.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        resta.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        resta.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                restaActionPerformed(evt);
            }
        });
        jPanel2.add(resta, new org.netbeans.lib.awtextra.AbsoluteConstraints(220, 140, 50, 50));

        Igual.setBackground(new java.awt.Color(51, 255, 255));
        Igual.setFont(new java.awt.Font("Tw Cen MT Condensed Extra Bold", 1, 18)); // NOI18N
        Igual.setForeground(new java.awt.Color(255, 255, 255));
        Igual.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/boton3.png"))); // NOI18N
        Igual.setText("=");
        Igual.setToolTipText("");
        Igual.setFocusPainted(false);
        Igual.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        Igual.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/boton3.png"))); // NOI18N
        Igual.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón4.png"))); // NOI18N
        Igual.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                IgualActionPerformed(evt);
            }
        });
        jPanel2.add(Igual, new org.netbeans.lib.awtextra.AbsoluteConstraints(280, 260, 50, 50));

        suma.setFont(new java.awt.Font("Tahoma", 1, 12)); // NOI18N
        suma.setForeground(new java.awt.Color(0, 51, 153));
        suma.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        suma.setText("+");
        suma.setToolTipText("");
        suma.setFocusPainted(false);
        suma.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        suma.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        suma.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        suma.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                sumaActionPerformed(evt);
            }
        });
        jPanel2.add(suma, new org.netbeans.lib.awtextra.AbsoluteConstraints(220, 200, 50, 50));

        Borrar.setFont(new java.awt.Font("Nirmala UI Semilight", 1, 11)); // NOI18N
        Borrar.setForeground(new java.awt.Color(0, 51, 153));
        Borrar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        Borrar.setText("C");
        Borrar.setToolTipText("");
        Borrar.setFocusPainted(false);
        Borrar.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        Borrar.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        Borrar.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        Borrar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                BorrarActionPerformed(evt);
            }
        });
        jPanel2.add(Borrar, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, 20, 50, 50));

        jButton12.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        jButton12.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        jButton12.setText("1");
        jButton12.setToolTipText("");
        jButton12.setFocusPainted(false);
        jButton12.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jButton12.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        jButton12.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        jButton12.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton12ActionPerformed(evt);
            }
        });
        jPanel2.add(jButton12, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, 80, 50, 50));

        jButton13.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        jButton13.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        jButton13.setText("2");
        jButton13.setToolTipText("");
        jButton13.setFocusPainted(false);
        jButton13.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jButton13.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        jButton13.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        jButton13.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton13ActionPerformed(evt);
            }
        });
        jPanel2.add(jButton13, new org.netbeans.lib.awtextra.AbsoluteConstraints(80, 80, 50, 50));

        jButton14.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        jButton14.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        jButton14.setText("C");
        jButton14.setToolTipText("");
        jButton14.setFocusPainted(false);
        jButton14.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jButton14.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        jButton14.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        jButton14.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton14ActionPerformed(evt);
            }
        });
        jPanel2.add(jButton14, new org.netbeans.lib.awtextra.AbsoluteConstraints(80, 80, 50, 50));

        tres.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        tres.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        tres.setText("3");
        tres.setToolTipText("");
        tres.setFocusPainted(false);
        tres.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        tres.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        tres.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        tres.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                tresActionPerformed(evt);
            }
        });
        jPanel2.add(tres, new org.netbeans.lib.awtextra.AbsoluteConstraints(150, 80, 50, 50));

        seis.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        seis.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        seis.setText("6");
        seis.setToolTipText("");
        seis.setFocusPainted(false);
        seis.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        seis.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        seis.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        seis.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                seisActionPerformed(evt);
            }
        });
        jPanel2.add(seis, new org.netbeans.lib.awtextra.AbsoluteConstraints(150, 140, 50, 50));

        nueve.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        nueve.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        nueve.setText("9");
        nueve.setToolTipText("");
        nueve.setFocusPainted(false);
        nueve.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        nueve.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        nueve.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        nueve.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                nueveActionPerformed(evt);
            }
        });
        jPanel2.add(nueve, new org.netbeans.lib.awtextra.AbsoluteConstraints(150, 200, 50, 50));

        cambio.setFont(new java.awt.Font("Tahoma", 1, 8)); // NOI18N
        cambio.setForeground(new java.awt.Color(0, 51, 153));
        cambio.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        cambio.setText("+/-");
        cambio.setToolTipText("");
        cambio.setFocusPainted(false);
        cambio.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        cambio.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        cambio.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        cambio.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cambioActionPerformed(evt);
            }
        });
        jPanel2.add(cambio, new org.netbeans.lib.awtextra.AbsoluteConstraints(150, 260, 50, 50));

        ocho.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        ocho.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        ocho.setText("8");
        ocho.setToolTipText("");
        ocho.setFocusPainted(false);
        ocho.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        ocho.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        ocho.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        ocho.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                ochoActionPerformed(evt);
            }
        });
        jPanel2.add(ocho, new org.netbeans.lib.awtextra.AbsoluteConstraints(80, 200, 50, 50));

        cinco.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        cinco.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        cinco.setText("5");
        cinco.setToolTipText("");
        cinco.setFocusPainted(false);
        cinco.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        cinco.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        cinco.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        cinco.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cincoActionPerformed(evt);
            }
        });
        jPanel2.add(cinco, new org.netbeans.lib.awtextra.AbsoluteConstraints(80, 140, 50, 50));

        cuatro.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        cuatro.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        cuatro.setText("4");
        cuatro.setToolTipText("");
        cuatro.setFocusPainted(false);
        cuatro.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        cuatro.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        cuatro.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        cuatro.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                cuatroActionPerformed(evt);
            }
        });
        jPanel2.add(cuatro, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, 140, 50, 50));

        siete.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        siete.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        siete.setText("7");
        siete.setToolTipText("");
        siete.setFocusPainted(false);
        siete.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        siete.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        siete.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        siete.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                sieteActionPerformed(evt);
            }
        });
        jPanel2.add(siete, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, 200, 50, 50));

        cero.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        cero.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        cero.setText("0");
        cero.setToolTipText("");
        cero.setFocusPainted(false);
        cero.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        cero.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        cero.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        cero.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                ceroActionPerformed(evt);
            }
        });
        jPanel2.add(cero, new org.netbeans.lib.awtextra.AbsoluteConstraints(80, 260, 50, 50));

        raz.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        raz.setForeground(new java.awt.Color(0, 51, 153));
        raz.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        raz.setText("√");
        raz.setToolTipText("");
        raz.setFocusPainted(false);
        raz.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        raz.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        raz.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        raz.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                razActionPerformed(evt);
            }
        });
        jPanel2.add(raz, new org.netbeans.lib.awtextra.AbsoluteConstraints(280, 20, 50, 50));

        entreUno.setFont(new java.awt.Font("Tahoma", 1, 8)); // NOI18N
        entreUno.setForeground(new java.awt.Color(0, 51, 153));
        entreUno.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        entreUno.setText("1/x");
        entreUno.setToolTipText("");
        entreUno.setFocusPainted(false);
        entreUno.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        entreUno.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        entreUno.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        entreUno.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                entreUnoActionPerformed(evt);
            }
        });
        jPanel2.add(entreUno, new org.netbeans.lib.awtextra.AbsoluteConstraints(280, 200, 50, 50));

        renDos.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        renDos.setForeground(new java.awt.Color(0, 51, 153));
        renDos.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        renDos.setText("(");
        renDos.setToolTipText("");
        renDos.setFocusPainted(false);
        renDos.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        renDos.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        renDos.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        renDos.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                renDosActionPerformed(evt);
            }
        });
        jPanel2.add(renDos, new org.netbeans.lib.awtextra.AbsoluteConstraints(280, 80, 50, 50));

        renUno.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        renUno.setForeground(new java.awt.Color(0, 51, 153));
        renUno.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        renUno.setText(")");
        renUno.setToolTipText("");
        renUno.setFocusPainted(false);
        renUno.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        renUno.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        renUno.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        renUno.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                renUnoActionPerformed(evt);
            }
        });
        jPanel2.add(renUno, new org.netbeans.lib.awtextra.AbsoluteConstraints(280, 140, 50, 50));

        suma1.setFont(new java.awt.Font("Tahoma", 1, 6)); // NOI18N
        suma1.setForeground(new java.awt.Color(0, 51, 153));
        suma1.setIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        suma1.setText("MOD");
        suma1.setToolTipText("");
        suma1.setFocusPainted(false);
        suma1.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        suma1.setPressedIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón1.png"))); // NOI18N
        suma1.setRolloverIcon(new javax.swing.ImageIcon(getClass().getResource("/imagenes/botón2.png"))); // NOI18N
        suma1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                suma1ActionPerformed(evt);
            }
        });
        jPanel2.add(suma1, new org.netbeans.lib.awtextra.AbsoluteConstraints(220, 260, 50, 50));

        getContentPane().add(jPanel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(0, 160, 350, 340));

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void BorrarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_BorrarActionPerformed
          
        txtOperation.setText("");
        txtResultado.setText("");
    }//GEN-LAST:event_BorrarActionPerformed

    private void MenosunoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_MenosunoActionPerformed
      String texto = txtOperation.getText().substring(0, txtOperation.getText().length() - 1);
        txtOperation.setText(texto);  
    }//GEN-LAST:event_MenosunoActionPerformed

    private void IgualActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_IgualActionPerformed
       try {
           String Re=se.eval(txtOperation.getText()).toString();
           
           txtResultado.setText(Re);
           
       } catch (ScriptException ex) {
           txtResultado.setText("Error");
          
       }
      
       int b=0;
        
    }//GEN-LAST:event_IgualActionPerformed

    private void PotenciaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_PotenciaActionPerformed
if (txtOperation.getText()=="") {
					txtOperation.setText("Math.pow(0)");
				}
				else {
					txtOperation.setText("Math.pow("+txtOperation.getText()+",2)");
				}       
    }//GEN-LAST:event_PotenciaActionPerformed

    private void divisionActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_divisionActionPerformed
 
 addNumber("/");
 ff("/");
    }//GEN-LAST:event_divisionActionPerformed

    private void jButton12ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton12ActionPerformed
      addNumber("1");
      
    
    }//GEN-LAST:event_jButton12ActionPerformed

    private void jButton13ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton13ActionPerformed
    addNumber("2");
   
   
    }//GEN-LAST:event_jButton13ActionPerformed

    private void tresActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_tresActionPerformed
       addNumber("3");
     
      
    }//GEN-LAST:event_tresActionPerformed

    private void multiActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_multiActionPerformed
 
  addNumber("*");
 ff("*");
    }//GEN-LAST:event_multiActionPerformed

    private void cuatroActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cuatroActionPerformed
     addNumber("4");
     
    
    }//GEN-LAST:event_cuatroActionPerformed

    private void cincoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cincoActionPerformed
        addNumber("5");
      
    
        
    }//GEN-LAST:event_cincoActionPerformed

    private void seisActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_seisActionPerformed
    addNumber("6");
     
    
    }//GEN-LAST:event_seisActionPerformed

    private void sieteActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_sieteActionPerformed
      addNumber("7");
       
    
    }//GEN-LAST:event_sieteActionPerformed

    private void ochoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_ochoActionPerformed
    addNumber("8");
    
    
    
    }//GEN-LAST:event_ochoActionPerformed

    private void nueveActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_nueveActionPerformed
    addNumber("9");
    
    
    
    }//GEN-LAST:event_nueveActionPerformed

    private void sumaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_sumaActionPerformed
  
        ff("+");
 addNumber("+"); 
 
  
    }//GEN-LAST:event_sumaActionPerformed

    private void puntoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_puntoActionPerformed
    addNumber(".");
    
  
    
    }//GEN-LAST:event_puntoActionPerformed

    private void cambioActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_cambioActionPerformed
       
        try {
            txtOperation.setText("("+txtOperation.getText()+"*(-1))");
           String hh=se.eval(txtResultado.getText()+"*(-1)").toString();
           txtResultado.setText(hh);
          
       } catch (ScriptException ex) {
           
       }
    
    }//GEN-LAST:event_cambioActionPerformed

    private void ceroActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_ceroActionPerformed
      addNumber("0");
    }//GEN-LAST:event_ceroActionPerformed

    private void restaActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_restaActionPerformed

        addNumber("-");
        ff("-");
 

    }//GEN-LAST:event_restaActionPerformed

    private void razActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_razActionPerformed
    if (txtOperation.getText()=="") {
					txtOperation.setText("Math.sqrt(0)");
				}
				else {
					txtOperation.setText("Math.sqrt("+txtOperation.getText()+")");
				}   
    }//GEN-LAST:event_razActionPerformed

    private void entreUnoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_entreUnoActionPerformed
       if (txtOperation.getText()=="") {
					txtOperation.setText("1/0");
                                        
				}
				else {
					txtOperation.setText("1/("+txtOperation.getText()+")");
				}
    }//GEN-LAST:event_entreUnoActionPerformed

    private void renDosActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_renDosActionPerformed
        addNumber("(");
    }//GEN-LAST:event_renDosActionPerformed

    private void renUnoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_renUnoActionPerformed
         addNumber(")");
    }//GEN-LAST:event_renUnoActionPerformed
boolean modoO=false;
    private void jButton8ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton8ActionPerformed
    if(!modoO){
        
            jPanel1.setBackground(Color.decode("#086590"));
     jPanel2.setBackground(Color.decode("#3a6f88"));
     txtOperation.setForeground(Color.decode("#09d9ff"));
     txtResultado.setForeground(Color.decode("#09d9ff"));
    cambiarColor(suma);
     cambiarColor(resta);
      cambiarColor(seis);
       cambiarColor(cinco);
        cambiarColor(cuatro);
         cambiarColor(tres);
          cambiarColor(jButton12);
           cambiarColor(jButton13);
            cambiarColor(Borrar);
             cambiarColor(suma);
             cambiarColor(suma1);
              cambiarColor(Menosuno);
               cambiarColor(Potencia);
                cambiarColor(division);
                 cambiarColor(raz); 
                  cambiarColor(multi);
                   cambiarColor(renDos);
                    cambiarColor(renUno);
                     cambiarColor(punto);
                     
                       cambiarColor(entreUno);
                        cambiarColor(cero);
                         cambiarColor(siete);
                          cambiarColor(ocho);
                           cambiarColor(nueve);
                            cambiarColor(cambio);
                 Igual.setIcon(new ImageIcon(getClass().getResource("/imagenes/boton8.png")));
                 jButton8.setIcon(new ImageIcon(getClass().getResource("/imagenes/li.png")));
      Igual.setPressedIcon(new ImageIcon(getClass().getResource("/imagenes/boton9.png")));
      Igual.setRolloverIcon(new ImageIcon(getClass().getResource("/imagenes/boton9.png")));
     Igual.setForeground(Color.decode("#96a8a0"));
     txtOperation.setBackground(Color.decode("#36a8a0"));
     txtOperation.setForeground(Color.decode("#001345"));
     modoO=true;            
     
    }else{Calculadora frame=new Calculadora();
    
    this.dispose();
    frame.setVisible(true);
    }
       
     
    }//GEN-LAST:event_jButton8ActionPerformed

    private void jButton14ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton14ActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jButton14ActionPerformed

    private void jLabel2MouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabel2MouseClicked
     this.dispose();
    }//GEN-LAST:event_jLabel2MouseClicked

    private void jLabel1MouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jLabel1MouseClicked
     this.setState(Frame.ICONIFIED);
    }//GEN-LAST:event_jLabel1MouseClicked

    private void suma1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_suma1ActionPerformed
      addNumber("%");
      ff("%");
    }//GEN-LAST:event_suma1ActionPerformed
public void cambiarColor(JButton btn){
    btn.setIcon(new ImageIcon(getClass().getResource("/imagenes/boton6.png")));
      btn.setPressedIcon(new ImageIcon(getClass().getResource("/imagenes/boton7.png")));
      btn.setRolloverIcon(new ImageIcon(getClass().getResource("/imagenes/boton7.png")));
     btn.setForeground(Color.decode("#96a8a0"));
    
}
public void addNumber(String d){
txtOperation.setText(txtOperation.getText()+d);

}



public void ff(String f){


txtResultado.setText(null);

}

    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Calculadora.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Calculadora.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Calculadora.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Calculadora.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Calculadora().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton Borrar;
    private javax.swing.JButton Igual;
    private javax.swing.JButton Menosuno;
    private javax.swing.JButton Potencia;
    private javax.swing.JButton cambio;
    private javax.swing.JButton cero;
    private javax.swing.JButton cinco;
    private javax.swing.JButton cuatro;
    private javax.swing.JButton division;
    private javax.swing.JButton entreUno;
    private javax.swing.JButton jButton1;
    private javax.swing.JButton jButton12;
    private javax.swing.JButton jButton13;
    private javax.swing.JButton jButton14;
    private javax.swing.JButton jButton8;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JPanel jPanel2;
    private javax.swing.JButton multi;
    private javax.swing.JButton nueve;
    private javax.swing.JButton ocho;
    private javax.swing.JButton punto;
    private javax.swing.JButton raz;
    private javax.swing.JButton renDos;
    private javax.swing.JButton renUno;
    private javax.swing.JButton resta;
    private javax.swing.JButton seis;
    private javax.swing.JButton siete;
    private javax.swing.JButton suma;
    private javax.swing.JButton suma1;
    private javax.swing.JButton tres;
    private javax.swing.JTextField txtOperation;
    private javax.swing.JLabel txtResultado;
    // End of variables declaration//GEN-END:variables

    private void indexOf(String f) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
}
