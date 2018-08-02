<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : Order2_XSL.xsl
    Created on : August 2, 2018, 9:53 PM
    Author     : JJzaii
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Order2_XSL.xsl</title>
            </head>
            <body>
                <h1>Today Received Order Records </h1>
                
                <table border="1">
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Customer ID</th>
                        <th>Status</th>
                        <th>Payment(RM)</th>
 
                        
                    </tr>
          
                    <xsl:for-each select="Orders/Order">
                        <xsl:sort select="amount"/>
                        <tr>
                            <td>
                                <xsl:value-of select="Order_ID" />
                            </td>
                            <td>
                                <xsl:value-of select="orderDate" />
                            </td>
                            <td>
                                <xsl:value-of select="custID" />
                            </td>
                            <td>
                                <xsl:value-of select="status" />
                            </td>
                            <td>
                                <xsl:value-of select="amount" />
                            </td>
    
                        </tr>
                    </xsl:for-each>
                </table>   
                <p>
                    Total of order for today is <xsl:value-of select="count(//Orders)"/> item(s).
                    <br/>
                    Total amount for today order is RM<xsl:value-of select="sum(//Order[amount]/amount)"/>
                    
                </p> 
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
