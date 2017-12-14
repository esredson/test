package com.esredson.teste.client;

import java.net.URL;

import javax.xml.namespace.QName;
import javax.xml.ws.Service;

import com.esredson.teste.IServico;

public class ServicoClient {
	public static void main(String[] args) throws Exception {
		URL url = new URL("http://localhost:8080/ws/servico?wsdl");
		QName qname = new QName("http://teste.esredson.com/", "Teste1Service");
		Service service = Service.create(url, qname);
		IServico hello = service.getPort(IServico.class);
		System.out.println(hello.metodo1("bbb"));
	}
}
