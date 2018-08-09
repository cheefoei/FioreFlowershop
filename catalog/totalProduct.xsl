<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
                version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>Product</title>
            </head>
            <link rel="stylesheet" href="css/table.css"/>
            <body>
                <h1 style="text-align:center">Product's database</h1>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Type</th>
                            <th>Description</th>
                            <th>Date Created</th>
                            <th>Date Expire</th>
                            <th>total_stock</th>
                            <th>Price</th>
                            <th>Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:for-each select="products/product">
                            <tr>
                                <td>
                                    <xsl:value-of select="product_id" />
                                </td>
                                <td>
                                    <xsl:value-of select="product_name" />
                                </td>
                                <td>
                                    <xsl:value-of select="product_type" />
                                </td>
                                <td>
                                    <xsl:value-of select="product_description" />
                                </td>
                                <td>
                                    <xsl:value-of select="date_created" />
                                </td>
                                <td>
                                    <xsl:value-of select="date_expired" />                   
                                </td>
                                <xsl:choose>                                    
                                    <xsl:when test="total_stock &lt; 10">
                                                <td bgcolor="FF9292">
                                            <xsl:value-of select="total_stock" /> 
                                        </td>
                                              </xsl:when>
                                    <xsl:otherwise>
                                        <td>
                                            <xsl:value-of select="total_stock" />                   
                                        </td>
                                    </xsl:otherwise>
                                
                                </xsl:choose>
                                <td>                                  
                                    <xsl:value-of select="price" />
                                </td>
                                <td>                                  
                                    <xsl:value-of select="weight" />
                                </td>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>                
                <xsl:variable name="greater" select="products/product/price[number(.) &gt; 50]"/>
                <xsl:variable name="lowstock" select="products/product/total_stock[number(.) &lt; 10]"/>
                <p style="text-align:center">
                    Total of product in database is <xsl:value-of select="count(//product)"/> item(s).
                    <br/>
                    Total of item greater than RM50 in database is <xsl:value-of select="count($greater)"/> item(s).
                    <br/>
                    Total of item in low stock is  <xsl:value-of select="count($lowstock)"/> item(s). 
                    <br/>
                    Total of item in low stock is  <xsl:value-of select="sum(//product[price]/price)"/> ringgit(s).
                </p>        
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
