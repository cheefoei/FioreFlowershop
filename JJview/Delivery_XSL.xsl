<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : Delivery_XSL.xsl
    Created on : August 2, 2018, 10:55 PM
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
                <title>Delivery_XSL.xsl</title>
            </head>
            <body>
                <h1>Today Delivery Record </h1>
                
                <table border="1">
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Delivered Date</th>
                        <th>Payment(RM)</th>
                        <th>Payment Date</th>
                        <th>Delivered Time</th>
                        <th>Staff ID</th>
                        <th>Delivery Address</th>
                        
                    </tr>
          
                    <xsl:for-each select="Deliverys/Delivery">
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
                                <xsl:value-of select="custName" />
                            </td>
                            <td>
                                <xsl:value-of select="pickupDate" />
                            </td>
                            <td>
                                <xsl:value-of select="Payment" />
                            </td>
                            <td>
                                <xsl:value-of select="paymentDate" />
                            </td>
                            <td>
                                <xsl:value-of select="payTime" />
                            </td>
                            <td>
                                <xsl:value-of select="staffID" />
                            </td>
                            <td>
                                <xsl:value-of select="address" />
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>    
                <p>
                    Total of Delivery for today is <xsl:value-of select="count(//Delivery)"/> item(s).
                    <br/>
                    Total amount for today Delivery is RM<xsl:value-of select="sum(//Delivery[Payment]/Payment)"/>
                    <br/>
                </p>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
