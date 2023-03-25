import java.sql.*;
import java.sql.DriverManager;

public class demo {
  public static void main(String[] args) {

    try {
       Connection conn = DriverManager.getConnection("jdbc:mysql://localhost/new folder/hello", "root", "");
       System.out.println("Connection successful");
    } catch (Exception e) {
       System.err.println(e);
    }
  }
}