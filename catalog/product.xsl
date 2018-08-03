<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
  version="1.0">
  <xsl:output method="html"/>

  <xsl:template match="/">
    <html>
      <head><title>Product</title></head>
      <body>
        <h1>Product's database</h1>
        
        <table border="1">
          <tr><th>Product ID</th><th>Name</th><th>Type</th><th>Description</th><th>Date Created</th><th>Date Expire</th><th>Total stock</th><th>Price</th><th>Weight</th></tr>
          
          <xsl:for-each select="products/product">
            <tr>
              <td><xsl:value-of select="product_id" /></td>
              <td><xsl:value-of select="product_name" /></td>
              <td><xsl:value-of select="product_type" /></td>
              <td><xsl:value-of select="product_description" /></td>
              <td><xsl:value-of select="date_created" /></td>
              <td><xsl:value-of select="date_expired" /></td>
              <td><xsl:value-of select="total_stock" /></td>
              <td><xsl:value-of select="price" /></td>
              <td><xsl:value-of select="weight" /></td>
            </tr>
          </xsl:for-each>
        </table>       
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>
