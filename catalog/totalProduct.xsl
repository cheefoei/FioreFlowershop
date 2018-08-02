<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
  version="1.0">
  <xsl:output method="html"/>

  <xsl:template match="/">
    <html>
      <head><title>Product</title></head>
      <body>
        <h1>Product's database</h1>
        <p>
          Total of product in database is <xsl:value-of select="count(//product)"/> item(s).
          <br/>
          Total of price in database is <xsl:value-of select="sum(//product[price]/price)"/> ringgit(s).
        </p>        
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>
