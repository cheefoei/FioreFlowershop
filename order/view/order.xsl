<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
  version="1.0">
  <xsl:output method="html"/>

  <xsl:template match="/">
    <html>
      <head><title>Sales Order Report</title></head>
      <body>
        <h1>Sales Order Report</h1>
        
        <xsl:for-each select="orders/order">
        
        <h4>Order ID : <xsl:value-of select="order_id" /></h4>
        <h4>Order Date : <xsl:value-of select="order_date" /></h4>
        <h4>Order Amount : <xsl:value-of select="total_amount" /></h4>
        <h4>Status : <xsl:value-of select="status" /></h4>
        <table border="1">
          <tr><th>Order List ID</th><th>Product ID</th><th>Product Name</th><th>Unit Price</th><th>Quantity</th><th>Subtotal</th></tr>
          
          <xsl:for-each select="orderlist">
            <tr>
              <td><xsl:value-of select="orderlistID" /></td>
              <td><xsl:value-of select="productID" /></td>
              <td><xsl:value-of select="productName" /></td>
              <td><xsl:value-of select="unitPrice" /></td>
              <td><xsl:value-of select="quantity" /></td>
              <td><xsl:value-of select="subtotal" /></td>
            </tr>
          </xsl:for-each>
        </table>   
        </xsl:for-each>    
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>
