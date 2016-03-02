/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package decifratura;

import java.io.*;
import java.util.*;

/**
 *
 * @author compito
 */
public class Decifratura {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws FileNotFoundException{
        // TODO code application logic here
         File file = new File("cesare.bmp");
         File file1 = new File("cesaredecifrato.bmp");
         FileInputStream f= new FileInputStream(file);
         FileOutputStream f1 = new FileOutputStream(file1);
         int nLetti,fLetti,chiave;
         
         chiave = 1;
         fLetti = 0;
         try
         {
             nLetti=f.read();
             while(nLetti != -1)
             {
                 if(fLetti>=2190)
                 {
                     nLetti-=chiave%256;
                 }
                 chiave++;
                 fLetti++;
                 if(chiave==0)
                     chiave=1;
                 f1.write(nLetti);
                 nLetti=f.read();
             }
             f.close();
             f1.close();
         }
         catch(Exception e)
         {
             System.out.println("errore");
         }
    }
}
